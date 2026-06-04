
const envlocal = __dirname + '/../../../.env.local'
require('dotenv').config({ quiet: true, path: [envlocal] })

import Path from 'node:path'
import * as Fs from 'node:fs'

import { test, describe, afterEach } from 'node:test'
import assert from 'node:assert'


import { AffirmationGeneratorSDK, BaseFeature, stdutil } from '../../..'

import {
  envOverride,
  liveDelay,
  makeCtrl,
  makeMatch,
  makeReqdata,
  makeStepData,
  makeValid,
  maybeSkipControl,
} from '../../utility'


describe('GetRandomAffirmationEntity', async () => {

  // Per-test live pacing. Delay is read from sdk-test-control.json's
  // `test.live.delayMs`; only sleeps when AFFIRMATIONGENERATOR_TEST_LIVE=TRUE.
  afterEach(liveDelay('AFFIRMATIONGENERATOR_TEST_LIVE'))

  test('instance', async () => {
    const testsdk = AffirmationGeneratorSDK.test()
    const ent = testsdk.GetRandomAffirmation()
    assert(null != ent)
  })


  test('basic', async (t) => {

    const live = 'TRUE' === process.env.AFFIRMATION_GENERATOR_TEST_LIVE
    for (const op of ['load']) {
      if (maybeSkipControl(t, 'entityOp', 'get_random_affirmation.' + op, live)) return
    }

    const setup = basicSetup()
    // The basic flow consumes synthetic IDs and field values from the
    // fixture (entity TestData.json). Those don't exist on the live API.
    // Skip live runs unless the user provided a real ENTID env override.
    if (setup.syntheticOnly) {
      t.skip('live entity test uses synthetic IDs from fixture — set AFFIRMATION_GENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID JSON to run live')
      return
    }
    const client = setup.client
    const struct = setup.struct

    const isempty = struct.isempty
    const select = struct.select

    let get_random_affirmation_ref01_data = Object.values(setup.data.existing.get_random_affirmation)[0] as any

    // LOAD
    const get_random_affirmation_ref01_ent = client.GetRandomAffirmation()
    const get_random_affirmation_ref01_match_dt0: any = {}
    const get_random_affirmation_ref01_data_dt0 = await get_random_affirmation_ref01_ent.load(get_random_affirmation_ref01_match_dt0)
    assert(null != get_random_affirmation_ref01_data_dt0)


  })
})



function basicSetup(extra?: any) {
  // TODO: fix test def options
  const options: any = {} // null

  // TODO: needs test utility to resolve path
  const entityDataFile =
    Path.resolve(__dirname, 
      '../../../../.sdk/test/entity/get_random_affirmation/GetRandomAffirmationTestData.json')

  // TODO: file ready util needed?
  const entityDataSource = Fs.readFileSync(entityDataFile).toString('utf8')

  // TODO: need a xlang JSON parse utility in voxgig/struct with better error msgs
  const entityData = JSON.parse(entityDataSource)

  options.entity = entityData.existing

  let client = AffirmationGeneratorSDK.test(options, extra)
  const struct = client.utility().struct
  const merge = struct.merge
  const transform = struct.transform

  let idmap = transform(
    ['get_random_affirmation01','get_random_affirmation02','get_random_affirmation03'],
    {
      '`$PACK`': ['', {
        '`$KEY`': '`$COPY`',
        '`$VAL`': ['`$FORMAT`', 'upper', '`$COPY`']
      }]
    })

  // Detect whether the user provided a real ENTID JSON via env var. The
  // basic flow consumes synthetic IDs from the fixture file; without an
  // override those synthetic IDs reach the live API and 4xx. Surface this
  // to the test so it can skip rather than fail.
  const idmapEnvVal = process.env['AFFIRMATION_GENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID']
  const idmapOverridden = null != idmapEnvVal && idmapEnvVal.trim().startsWith('{')

  const env = envOverride({
    'AFFIRMATION_GENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID': idmap,
    'AFFIRMATION_GENERATOR_TEST_LIVE': 'FALSE',
    'AFFIRMATION_GENERATOR_TEST_EXPLAIN': 'FALSE',
  })

  idmap = env['AFFIRMATION_GENERATOR_TEST_GET_RANDOM_AFFIRMATION_ENTID']

  const live = 'TRUE' === env.AFFIRMATION_GENERATOR_TEST_LIVE

  if (live) {
    client = new AffirmationGeneratorSDK(merge([
      {
      },
      extra
    ]))
  }

  const setup = {
    idmap,
    env,
    options,
    client,
    struct,
    data: entityData,
    explain: 'TRUE' === env.AFFIRMATION_GENERATOR_TEST_EXPLAIN,
    live,
    syntheticOnly: live && !idmapOverridden,
    now: Date.now(),
  }

  return setup
}
  
