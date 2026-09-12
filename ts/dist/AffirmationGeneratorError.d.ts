import { Context } from './Context';
declare class AffirmationGeneratorError extends Error {
    isAffirmationGeneratorError: boolean;
    sdk: string;
    code: string;
    ctx: Context;
    status: number;
    get notFound(): boolean;
    constructor(code: string, msg: string, ctx: Context);
}
export { AffirmationGeneratorError };
