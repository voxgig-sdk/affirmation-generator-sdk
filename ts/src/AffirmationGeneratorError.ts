
import { Context } from './Context'


class AffirmationGeneratorError extends Error {

  isAffirmationGeneratorError = true

  sdk = 'AffirmationGenerator'

  code: string
  ctx: Context

  constructor(code: string, msg: string, ctx: Context) {
    super(msg)
    this.code = code
    this.ctx = ctx
  }

}

export {
  AffirmationGeneratorError
}

