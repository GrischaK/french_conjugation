<?php
require_once '../conjugate.php';

class ExceptionModelTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider ExceptionModelTestProvider
     */
    public function testConjugationModelTest($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals(new ExceptionModel($expectedResult), finding_exception_model(new InfinitiveVerb($infinitiveVerb)));
    }

    public function ExceptionModelTestProvider()
    {
        return [
            [
                ExceptionModel::ALLER,
                'aller'
            ],
            [
                ExceptionModel::AVOIR_IRR,
                'avoir'
            ],
            [
                ExceptionModel::ETRE_IRR,
                'être'
            ],
            [
                ExceptionModel::Eler_Ele,
                'peler'
            ],
            [
                ExceptionModel::Eter_Ete,
                'acheter'
            ],
            
            [
                ExceptionModel::Eler_Elle,
                'appeler'
            ],
            [
                ExceptionModel::Eter_Ette,
                'jeter'
            ],
            [
                ExceptionModel::E_Akut_ER,
                'sécher'
            ],
            [
                ExceptionModel::E_Akut_ER,
                'espérer'
            ],
            [
                ExceptionModel::E_Akut_ER,
                'accélérer'
            ],
            [
                ExceptionModel::E_Akut_CER,
                'apiécer'
            ],
            [
                ExceptionModel::E_Akut_GER,
                'agréger'
            ],
            [
                ExceptionModel::E_Akut_IER,
                'planchéier'
            ],
            [
                ExceptionModel::E_Akut_YER,
                'abréyer'
            ],
            [
                ExceptionModel::I_Trema_ER,
                'paranoïer'
            ],
            
            [
                ExceptionModel::E_Er,
                'peser'
            ],
            
            [
                ExceptionModel::CER,
                'agacer'
            ],
            [
                ExceptionModel::GER,
                'manger'
            ],
            [
                ExceptionModel::IER,
                'abrier'
            ],
            [
                ExceptionModel::YER,
                'payer'
            ],
            [
                ExceptionModel::ENVOYER,
                'envoyer'
            ],
            [
                ExceptionModel::DEVOIR,
                'devoir'
            ],
            [
                ExceptionModel::MOUVOIR,
                'mouvoir'
            ],
            [
                ExceptionModel::POUVOIR,
                'pouvoir'
            ],
            [
                ExceptionModel::SAVOIR,
                'savoir'
            ],
            [
                ExceptionModel::COURIR,
                'courir'
            ],
            [
                ExceptionModel::MOURIR,
                'mourir'
            ],
            [
                ExceptionModel::MOURIR,
                'mourir'
            ],
            [
                ExceptionModel::CHOIR,
                'choir'
            ],
            [
                ExceptionModel::CEVOIR,
                'apercevoir'
            ],
            [
                ExceptionModel::SEOIR,
                'asseoir'
            ],
            [
                ExceptionModel::VOULOIR,
                'vouloir'
            ],
            [
                ExceptionModel::QUERIR,
                'acquérir'
            ],
            [
                ExceptionModel::DORMIR,
                'dormir'
            ],
            [
                ExceptionModel::TIR,
                'assentir'
            ],
            [
                ExceptionModel::RIR,
                'couvrir'
            ],
            [
                ExceptionModel::SERVIR,
                'servir'
            ],
            [
                ExceptionModel::ENIR,
                'tenir'
            ],
            [
                ExceptionModel::FUIR,
                'fuir'
            ],
            [
                ExceptionModel::BOUILLIR,
                'bouillir'
            ],
            [
                ExceptionModel::SAILLIR,
                'saillir'
            ],
            [
                ExceptionModel::VALOIR,
                'valoir'
            ],
            [
                ExceptionModel::VOIR,
                'voir'
            ],
            [
                ExceptionModel::VOIR,
                'prévoir'
            ],
            [
                ExceptionModel::VOIR,
                'pourvoir'
            ],
            [
                ExceptionModel::CUEILLIR,
                'cueillir'
            ],
            [
                ExceptionModel::FAILLIR,
                'faillir'
            ],
            [
                ExceptionModel::VETIR,
                'vêtir'
            ],
            [
                ExceptionModel::FLEURIR,
                'fleurir'
            ],
            [
                ExceptionModel::PLEUVOIR,
                'pleuvoir'
            ],
            [
                ExceptionModel::FALLOIR,
                'falloir'
            ],
            [
                ExceptionModel::FAIRE,
                'faire'
            ],
            [
                ExceptionModel::PLAIRE,
                'plaire'
            ],
            [
                ExceptionModel::RAIRE,
                'braire'
            ],
            
            [
                ExceptionModel::VAINCRE,
                'vaincre'
            ],
            [
                ExceptionModel::DRE,
                'attendre'
            ],
            [
                ExceptionModel::PRENDRE,
                'prendre'
            ],
            [
                ExceptionModel::INDRE,
                'plaindre'
            ],
            [
                ExceptionModel::OINDRE,
                'joindre'
            ],
            [
                ExceptionModel::COUDRE,
                'coudre'
            ],
            [
                ExceptionModel::MOUDRE,
                'moudre'
            ],
            [
                ExceptionModel::SOUDRE,
                'absoudre'
            ],
            [
                ExceptionModel::RESOUDRE,
                'résoudre'
            ],
            [
                ExceptionModel::OCCIRE,
                'occire'
            ],
            [
                ExceptionModel::CIRCONCIRE,
                'circoncire'
            ],
            [
                ExceptionModel::DIRE,
                'dire'
            ],
            [
                ExceptionModel::MAUDIRE,
                'maudire'
            ],
            [
                ExceptionModel::SUFFIRE,
                'suffire'
            ],
            [
                ExceptionModel::CONFIRE,
                'confire'
            ],
            [
                ExceptionModel::LIRE,
                'lire'
            ],
            [
                ExceptionModel::BOIRE,
                'boire'
            ],
            [
                ExceptionModel::CROIRE,
                'croire'
            ],
            [
                ExceptionModel::RIRE,
                'rire'
            ],
            [
                ExceptionModel::CRIRE,
                'écrire'
            ],
            [
                ExceptionModel::FRIRE,
                'frire'
            ],
            [
                ExceptionModel::UIRE,
                'cuire'
            ],
            [
                ExceptionModel::BRUIRE,
                'bruire'
            ],
            
            [
                ExceptionModel::CLORE,
                'clore'
            ],
            [
                ExceptionModel::ROMPRE,
                'rompre'
            ],
            [
                ExceptionModel::AITRE,
                'paitre'
            ],
            [
                ExceptionModel::AITRE,
                'paître'
            ],
            [
                ExceptionModel::NAITRE,
                'naitre'
            ],
            [
                ExceptionModel::NAITRE,
                'naître'
            ],
            [
                ExceptionModel::OITRE,
                'croitre'
            ],
            [
            ExceptionModel::OITRE,
            'croître'
                ],
            [
                ExceptionModel::ATTRE,
                'battre'
            ],
            [
                ExceptionModel::METTRE,
                'mettre'
            ],  
            [
                ExceptionModel::FOUTRE,
                'foutre'
            ],
            [
                ExceptionModel::CLURE,
                'inclure'
            ],
            [
                ExceptionModel::SUIVRE,
                'suivre'
            ],
            [
                ExceptionModel::VIVRE,
                'vivre'
            ]
        ];
    }
}

?>