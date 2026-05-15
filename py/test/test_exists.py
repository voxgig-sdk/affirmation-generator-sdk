# ProjectName SDK exists test

import pytest
from affirmationgenerator_sdk import AffirmationGeneratorSDK


class TestExists:

    def test_should_create_test_sdk(self):
        testsdk = AffirmationGeneratorSDK.test(None, None)
        assert testsdk is not None
