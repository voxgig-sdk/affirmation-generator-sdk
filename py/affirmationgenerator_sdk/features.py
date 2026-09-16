# AffirmationGenerator SDK feature factory

from affirmationgenerator_sdk.feature.base_feature import AffirmationGeneratorBaseFeature
from affirmationgenerator_sdk.feature.ratelimit_feature import AffirmationGeneratorRatelimitFeature
from affirmationgenerator_sdk.feature.retry_feature import AffirmationGeneratorRetryFeature
from affirmationgenerator_sdk.feature.test_feature import AffirmationGeneratorTestFeature
from affirmationgenerator_sdk.feature.timeout_feature import AffirmationGeneratorTimeoutFeature


_FEATURES = {
    "base": lambda: AffirmationGeneratorBaseFeature(),
    "ratelimit": lambda: AffirmationGeneratorRatelimitFeature(),
    "retry": lambda: AffirmationGeneratorRetryFeature(),
    "test": lambda: AffirmationGeneratorTestFeature(),
    "timeout": lambda: AffirmationGeneratorTimeoutFeature(),
}


def _make_feature(name):
    factory = _FEATURES.get(name)
    if factory is not None:
        return factory()
    return _FEATURES["base"]()


# True when this SDK was generated with the named feature class - the
# constructor's tolerance for extend-carried features reads this (an
# active name with no generated class must not become a BaseFeature
# stray when an extend instance carries it).
def _has_feature(name):
    return name in _FEATURES
