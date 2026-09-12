import { GetRandomAffirmationEntity } from './entity/GetRandomAffirmationEntity';
export type * from './AffirmationGeneratorTypes';
import { inspect } from 'node:util';
import type { Context, Feature } from './types';
import { config } from './Config';
import { AffirmationGeneratorEntityBase } from './AffirmationGeneratorEntityBase';
import { Utility } from './utility/Utility';
import { BaseFeature } from './feature/base/BaseFeature';
declare const stdutil: Utility;
declare class AffirmationGeneratorSDK {
    _mode: string;
    _options: any;
    _utility: Utility;
    _features: Feature[];
    _rootctx: Context;
    constructor(options?: any);
    options(): any;
    utility(): any;
    prepare(fetchargs?: any): Promise<any>;
    direct(fetchargs?: any): Promise<Error | {
        ok: boolean;
        status: number;
        headers: any;
        data: any;
        err?: undefined;
    } | {
        ok: boolean;
        err: any;
        status?: undefined;
        headers?: undefined;
        data?: undefined;
    }>;
    _rawRequest(fetchargs?: any): Promise<Error | {
        ok: boolean;
        status: number;
        headers: any;
        data: any;
        err?: undefined;
    } | {
        ok: boolean;
        err: any;
        status?: undefined;
        headers?: undefined;
        data?: undefined;
    }>;
    graphql(query: string, variables?: any, ctrl?: any): Promise<any>;
    GetRandomAffirmation(entopts?: Record<string, any>): GetRandomAffirmationEntity;
    static test(testoptsarg?: any, sdkoptsarg?: any): AffirmationGeneratorSDK;
    tester(testopts?: any, sdkopts?: any): AffirmationGeneratorSDK;
    toJSON(): {
        name: string;
    };
    toString(): string;
    [inspect.custom](): string;
}
declare const SDK: typeof AffirmationGeneratorSDK;
export { stdutil, config, BaseFeature, AffirmationGeneratorEntityBase, AffirmationGeneratorSDK, SDK, };
