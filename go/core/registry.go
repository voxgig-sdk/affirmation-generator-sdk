package core

var UtilityRegistrar func(u *Utility)

var NewBaseFeatureFunc func() Feature

var NewTestFeatureFunc func() Feature

var NewGetRandomAffirmationEntityFunc func(client *AffirmationGeneratorSDK, entopts map[string]any) AffirmationGeneratorEntity

