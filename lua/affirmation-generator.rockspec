package = "voxgig-sdk-affirmation-generator"
version = "0.0-1"
source = {
  url = "git://github.com/voxgig-sdk/affirmation-generator-sdk.git"
}
description = {
  summary = "AffirmationGenerator SDK for Lua",
  license = "MIT"
}
dependencies = {
  "lua >= 5.3",
  "dkjson >= 2.5",
  "dkjson >= 2.5",
}
build = {
  type = "builtin",
  modules = {
    ["affirmation-generator_sdk"] = "affirmation-generator_sdk.lua",
    ["config"] = "config.lua",
    ["features"] = "features.lua",
  }
}
