package core

type AffirmationGeneratorError struct {
	IsAffirmationGeneratorError bool
	Sdk              string
	Code             string
	Msg              string
	Ctx              *Context
	Result           any
	Spec             any
}

func NewAffirmationGeneratorError(code string, msg string, ctx *Context) *AffirmationGeneratorError {
	return &AffirmationGeneratorError{
		IsAffirmationGeneratorError: true,
		Sdk:              "AffirmationGenerator",
		Code:             code,
		Msg:              msg,
		Ctx:              ctx,
	}
}

func (e *AffirmationGeneratorError) Error() string {
	return e.Msg
}
