# AffirmationGenerator SDK feature factory

from affirmationgenerator_sdk.feature.base_feature import AffirmationGeneratorBaseFeature
from affirmationgenerator_sdk.feature.test_feature import AffirmationGeneratorTestFeature


def _make_feature(name):
    features = {
        "base": lambda: AffirmationGeneratorBaseFeature(),
        "test": lambda: AffirmationGeneratorTestFeature(),
    }
    factory = features.get(name)
    if factory is not None:
        return factory()
    return features["base"]()
