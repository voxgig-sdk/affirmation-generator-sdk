# AffirmationGenerator SDK utility: make_context

from projectname_sdk.core.context import AffirmationGeneratorContext


def make_context_util(ctxmap, basectx):
    return AffirmationGeneratorContext(ctxmap, basectx)
