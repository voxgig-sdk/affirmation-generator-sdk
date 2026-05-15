# AffirmationGenerator SDK utility: make_context

from core.context import AffirmationGeneratorContext


def make_context_util(ctxmap, basectx):
    return AffirmationGeneratorContext(ctxmap, basectx)
