package sdktest

import (
	"encoding/json"
	"os"
	"path/filepath"
	"runtime"
	"strings"
	"testing"
	"time"

	sdk "github.com/voxgig-sdk/affirmation-generator-sdk/go"
	"github.com/voxgig-sdk/affirmation-generator-sdk/go/core"

	vs "github.com/voxgig-sdk/affirmation-generator-sdk/go/utility/struct"
)

func TestGetRandomAffirmationEntity(t *testing.T) {
	t.Run("instance", func(t *testing.T) {
		testsdk := sdk.TestSDK(nil, nil)
		ent := testsdk.GetRandomAffirmation(nil)
		if ent == nil {
			t.Fatal("expected non-nil GetRandomAffirmationEntity")
		}
	})

	t.Run("basic", func(t *testing.T) {
		setup := get_random_affirmationBasicSetup(nil)
		// Per-op sdk-test-control.json skip — basic test exercises a flow
		// with multiple ops; skipping any op skips the whole flow.
		_mode := "unit"
		if setup.live {
			_mode = "live"
		}
		for _, _op := range []string{"load"} {
			if _shouldSkip, _reason := isControlSkipped("entityOp", "get_random_affirmation." + _op, _mode); _shouldSkip {
				if _reason == "" {
					_reason = "skipped via sdk-test-control.json"
				}
				t.Skip(_reason)
				return
			}
		}
		// The basic flow consumes synthetic IDs from the fixture. In live mode
		// without an *_ENTID env override, those IDs hit the live API and 4xx.
		if setup.syntheticOnly {
			t.Skip("live entity test uses synthetic IDs from fixture — set AFFIRMATIONGENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID JSON to run live")
			return
		}
		client := setup.client

		// Bootstrap entity data from existing test data (no create step in flow).
		getRandomAffirmationRef01DataRaw := vs.Items(core.ToMapAny(vs.GetPath("existing.get_random_affirmation", setup.data)))
		var getRandomAffirmationRef01Data map[string]any
		if len(getRandomAffirmationRef01DataRaw) > 0 {
			getRandomAffirmationRef01Data = core.ToMapAny(getRandomAffirmationRef01DataRaw[0][1])
		}
		// Discard guards against Go's unused-var check when the flow's steps
		// happen not to consume the bootstrap data (e.g. list-only flows).
		_ = getRandomAffirmationRef01Data

		// LOAD
		getRandomAffirmationRef01Ent := client.GetRandomAffirmation(nil)
		getRandomAffirmationRef01MatchDt0 := map[string]any{}
		getRandomAffirmationRef01DataDt0Loaded, err := getRandomAffirmationRef01Ent.Load(getRandomAffirmationRef01MatchDt0, nil)
		if err != nil {
			t.Fatalf("load failed: %v", err)
		}
		if getRandomAffirmationRef01DataDt0Loaded == nil {
			t.Fatal("expected load result to be non-nil")
		}

	})
}

func get_random_affirmationBasicSetup(extra map[string]any) *entityTestSetup {
	loadEnvLocal()

	_, filename, _, _ := runtime.Caller(0)
	dir := filepath.Dir(filename)

	entityDataFile := filepath.Join(dir, "..", "..", ".sdk", "test", "entity", "get_random_affirmation", "GetRandomAffirmationTestData.json")

	entityDataSource, err := os.ReadFile(entityDataFile)
	if err != nil {
		panic("failed to read get_random_affirmation test data: " + err.Error())
	}

	var entityData map[string]any
	if err := json.Unmarshal(entityDataSource, &entityData); err != nil {
		panic("failed to parse get_random_affirmation test data: " + err.Error())
	}

	options := map[string]any{}
	options["entity"] = entityData["existing"]

	client := sdk.TestSDK(options, extra)

	// Generate idmap via transform, matching TS pattern.
	idmap := vs.Transform(
		[]any{"get_random_affirmation01", "get_random_affirmation02", "get_random_affirmation03"},
		map[string]any{
			"`$PACK`": []any{"", map[string]any{
				"`$KEY`": "`$COPY`",
				"`$VAL`": []any{"`$FORMAT`", "upper", "`$COPY`"},
			}},
		},
	)

	// Detect ENTID env override before envOverride consumes it. When live
	// mode is on without a real override, the basic test runs against synthetic
	// IDs from the fixture and 4xx's. Surface this so the test can skip.
	entidEnvRaw := os.Getenv("AFFIRMATIONGENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID")
	idmapOverridden := entidEnvRaw != "" && strings.HasPrefix(strings.TrimSpace(entidEnvRaw), "{")

	env := envOverride(map[string]any{
		"AFFIRMATIONGENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID": idmap,
		"AFFIRMATIONGENERATOR_TEST_LIVE":      "FALSE",
		"AFFIRMATIONGENERATOR_TEST_EXPLAIN":   "FALSE",
		"AFFIRMATIONGENERATOR_APIKEY":         "NONE",
	})

	idmapResolved := core.ToMapAny(env["AFFIRMATIONGENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID"])
	if idmapResolved == nil {
		idmapResolved = core.ToMapAny(idmap)
	}

	if env["AFFIRMATIONGENERATOR_TEST_LIVE"] == "TRUE" {
		mergedOpts := vs.Merge([]any{
			map[string]any{
				"apikey": env["AFFIRMATIONGENERATOR_APIKEY"],
			},
			extra,
		})
		client = sdk.NewAffirmationGeneratorSDK(core.ToMapAny(mergedOpts))
	}

	live := env["AFFIRMATIONGENERATOR_TEST_LIVE"] == "TRUE"
	return &entityTestSetup{
		client:        client,
		data:          entityData,
		idmap:         idmapResolved,
		env:           env,
		explain:       env["AFFIRMATIONGENERATOR_TEST_EXPLAIN"] == "TRUE",
		live:          live,
		syntheticOnly: live && !idmapOverridden,
		now:           time.Now().UnixMilli(),
	}
}
