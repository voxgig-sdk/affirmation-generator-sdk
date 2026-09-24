
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { AffirmationGeneratorSDK } from '..'


describe('exists', async () => {

  test('test-mode', () => {
    const testsdk = AffirmationGeneratorSDK.test()
    equal(testsdk instanceof AffirmationGeneratorSDK, true,
      'AffirmationGeneratorSDK.test() must return a client synchronously')
  })

})
