# AffirmationGenerator SDK utility: make_error

from __future__ import annotations
from core.operation import AffirmationGeneratorOperation
from core.result import AffirmationGeneratorResult
from core.control import AffirmationGeneratorControl
from core.error import AffirmationGeneratorError


def make_error_util(ctx, err):
    if ctx is None:
        from core.context import AffirmationGeneratorContext
        ctx = AffirmationGeneratorContext({}, None)

    op = ctx.op
    if op is None:
        op = AffirmationGeneratorOperation({})
    opname = op.name
    if opname == "" or opname == "_":
        opname = "unknown operation"

    result = ctx.result
    if result is None:
        result = AffirmationGeneratorResult({})
    result.ok = False

    if err is None:
        err = result.err
    if err is None:
        err = ctx.make_error("unknown", "unknown error")

    errmsg = ""
    if isinstance(err, AffirmationGeneratorError):
        errmsg = err.msg
    elif hasattr(err, "msg") and err.msg is not None:
        errmsg = err.msg
    elif isinstance(err, str):
        errmsg = err
    else:
        errmsg = str(err)

    msg = "AffirmationGeneratorSDK: " + opname + ": " + errmsg
    msg = ctx.utility.clean(ctx, msg)

    result.err = None

    spec = ctx.spec

    if ctx.ctrl.explain is not None:
        ctx.ctrl.explain["err"] = {"message": msg}

    sdk_err = AffirmationGeneratorError("", msg, ctx)
    sdk_err.result = ctx.utility.clean(ctx, result)
    sdk_err.spec = ctx.utility.clean(ctx, spec)

    if isinstance(err, AffirmationGeneratorError):
        sdk_err.code = err.code

    ctx.ctrl.err = sdk_err

    if ctx.ctrl.throw_err is False:
        return result.resdata

    raise sdk_err
