import { AffirmationGeneratorEntityBase } from '../AffirmationGeneratorEntityBase';
import type { AffirmationGeneratorSDK } from '../AffirmationGeneratorSDK';
import type { Control } from '../types';
import type { GetRandomAffirmation, GetRandomAffirmationLoadMatch } from '../AffirmationGeneratorTypes';
declare class GetRandomAffirmationEntity extends AffirmationGeneratorEntityBase<GetRandomAffirmation> {
    constructor(client: AffirmationGeneratorSDK, entopts: any);
    make(this: GetRandomAffirmationEntity): GetRandomAffirmationEntity;
    load(this: any, reqmatch?: GetRandomAffirmationLoadMatch, ctrl?: Control): Promise<GetRandomAffirmationEntity>;
}
export { GetRandomAffirmationEntity };
