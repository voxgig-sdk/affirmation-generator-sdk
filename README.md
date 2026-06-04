# AffirmationGenerator SDK

Fetch a random positive affirmation as JSON, no auth required

> TypeScript, Python, PHP, Golang, Ruby, Lua SDKs, a CLI, an interactive REPL, and an MCP server for AI agents — all generated from one OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).

## About Affirmation Generator API

[Affirmations.dev](https://www.affirmations.dev) is a tiny, free public API that returns a single random affirmation — a short, positive statement intended to boost motivation, self-esteem, and mental wellness.

What you get from the API:

- A random affirmation string returned as a JSON object on each request.
- A single HTTP `GET` endpoint at the service root (`https://www.affirmations.dev/`).
- Plain, unauthenticated access — no API key or signup is required.

The service is lightweight and intended for casual integrations such as widgets, daily-reminder apps, chatbots, and learning projects. No published rate limits, terms, or licence are documented on the homepage; treat the data as informally provided and avoid abusive request volumes.

## Try it

**TypeScript**
```bash
npm install affirmation-generator
```

**Python**
```bash
pip install affirmation-generator-sdk
```

**PHP**
```bash
composer require voxgig/affirmation-generator-sdk
```

**Golang**
```bash
go get github.com/voxgig-sdk/affirmation-generator-sdk/go
```

**Ruby**
```bash
gem install affirmation-generator-sdk
```

**Lua**
```bash
luarocks install affirmation-generator-sdk
```

## 30-second quickstart

### TypeScript

```ts
import { AffirmationGeneratorSDK } from 'affirmation-generator'

const client = new AffirmationGeneratorSDK({})

```

See the [TypeScript README](ts/README.md) for the
full guide, or scroll down for the same example in other languages.

## What's in the box

| Surface | Use it for | Path |
| --- | --- | --- |
| **SDK** (TypeScript, Python, PHP, Golang, Ruby, Lua) | App integration | `ts/` `py/` `php/` `go/` `rb/` `lua/` |
| **CLI** | Scripts, CI, ops, one-off API calls | `go-cli/` |
| **MCP server** | AI agents (Claude, Cursor, Cline) | `go-mcp/` |

## Use it from an AI agent (MCP)

The generated MCP server exposes every operation in this SDK as an
[MCP](https://modelcontextprotocol.io) tool that Claude, Cursor or Cline
can call directly. Build and register it:

```bash
cd go-mcp && go build -o affirmation-generator-mcp .
```

Then add it to your agent's MCP config (Claude Desktop, Cursor, etc.):

```json
{
  "mcpServers": {
    "affirmation-generator": {
      "command": "/abs/path/to/affirmation-generator-mcp"
    }
  }
}
```

## Entities

The API exposes one entity:

| Entity | Description | API path |
| --- | --- | --- |
| **GetRandomAffirmation** | Retrieves a single random affirmation as a JSON object from the service root (`GET /`). | `/` |

Each entity supports the following operations where available: **load**,
**list**, **create**, **update**, and **remove**.

## Quickstart in other languages

### Python

```python
from affirmationgenerator_sdk import AffirmationGeneratorSDK

client = AffirmationGeneratorSDK({})


# Load a specific getrandomaffirmation
getrandomaffirmation, err = client.GetRandomAffirmation(None).load(
    {"id": "example_id"}, None
)
```

### PHP

```php
<?php
require_once 'affirmationgenerator_sdk.php';

$client = new AffirmationGeneratorSDK([]);


// Load a specific getrandomaffirmation
[$getrandomaffirmation, $err] = $client->GetRandomAffirmation(null)->load(
    ["id" => "example_id"], null
);
```

### Golang

```go
import sdk "github.com/voxgig-sdk/affirmation-generator-sdk/go"

client := sdk.NewAffirmationGeneratorSDK(map[string]any{})

```

### Ruby

```ruby
require_relative "AffirmationGenerator_sdk"

client = AffirmationGeneratorSDK.new({})


# Load a specific getrandomaffirmation
getrandomaffirmation, err = client.GetRandomAffirmation(nil).load(
  { "id" => "example_id" }, nil
)
```

### Lua

```lua
local sdk = require("affirmation-generator_sdk")

local client = sdk.new({})


-- Load a specific getrandomaffirmation
local getrandomaffirmation, err = client:GetRandomAffirmation(nil):load(
  { id = "example_id" }, nil
)
```

## Unit testing in offline mode

Every SDK ships a test mode that swaps the HTTP transport for an
in-memory mock, so unit tests run offline.

### TypeScript

```ts
const client = AffirmationGeneratorSDK.test()
const result = await client.GetRandomAffirmation().load({ id: 'test01' })
// result.ok === true, result.data contains mock data
```

### Python

```python
client = AffirmationGeneratorSDK.test(None, None)
result, err = client.GetRandomAffirmation(None).load(
    {"id": "test01"}, None
)
```

### PHP

```php
$client = AffirmationGeneratorSDK::test(null, null);
[$result, $err] = $client->GetRandomAffirmation(null)->load(
    ["id" => "test01"], null
);
```

### Golang

```go
client := sdk.TestSDK(nil, nil)
result, err := client.GetRandomAffirmation(nil).Load(
    map[string]any{"id": "test01"}, nil,
)
```

### Ruby

```ruby
client = AffirmationGeneratorSDK.test(nil, nil)
result, err = client.GetRandomAffirmation(nil).load(
  { "id" => "test01" }, nil
)
```

### Lua

```lua
local client = sdk.test(nil, nil)
local result, err = client:GetRandomAffirmation(nil):load(
  { id = "test01" }, nil
)
```

## How it works

Every SDK call runs the same five-stage pipeline:

1. **Point** — resolve the API endpoint from the operation definition.
2. **Spec** — build the HTTP specification (URL, method, headers, body).
3. **Request** — send the HTTP request.
4. **Response** — receive and parse the response.
5. **Result** — extract the result data for the caller.

A feature hook fires at each stage (e.g. `PrePoint`, `PreSpec`,
`PreRequest`), so features can inspect or modify the pipeline without
forking the SDK.

### Features

| Feature | Purpose |
| --- | --- |
| **TestFeature** | In-memory mock transport for testing without a live server |

Pass custom features via the `extend` option at construction time.

### Direct and Prepare

For endpoints the entity model doesn't cover, use the low-level methods:

- **`direct(fetchargs)`** — build and send an HTTP request in one step.
- **`prepare(fetchargs)`** — build the request without sending it.

Both accept a map with `path`, `method`, `params`, `query`,
`headers`, and `body`. See the [How-to guides](#how-to-guides) below.

## How-to guides

### Make a direct API call

When the entity interface does not cover an endpoint, use `direct`:

**TypeScript:**
```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example' },
})
console.log(result.data)
```

**Python:**
```python
result, err = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})
```

**PHP:**
```php
[$result, $err] = $client->direct([
    "path" => "/api/resource/{id}",
    "method" => "GET",
    "params" => ["id" => "example"],
]);
```

**Go:**
```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
```

**Ruby:**
```ruby
result, err = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})
```

**Lua:**
```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example" },
})
```

## Per-language documentation

- [TypeScript](ts/README.md)
- [Python](py/README.md)
- [PHP](php/README.md)
- [Golang](go/README.md)
- [Ruby](rb/README.md)
- [Lua](lua/README.md)

## Using the Affirmation Generator API

- Upstream: [https://www.affirmations.dev](https://www.affirmations.dev)

---

Generated from the Affirmation Generator API OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).
