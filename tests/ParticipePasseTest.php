<?php
require_once '../conjugate.php';

class ParticipePasseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider ParticipePasseTestProvider
     */
    public function testParticipePasse($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals($expectedResult, finding_participe_passe(new InfinitiveVerb($infinitiveVerb)));
    }

    public function ParticipePasseTestProvider()
    {
        return [
            [
                'aimé',
                'aimer'
            ],
            [
                'fini',
                'finir'
            ],
            [
                'haï',
                'haïr'
            ]
        ];
    }

    /**
     * @dataProvider UnregularParticipePasseTestProvider
     */
    public function testUnregularParticipePasse($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals($expectedResult, finding_participe_passe(new InfinitiveVerb($infinitiveVerb)));
    }

    public function UnregularParticipePasseTestProvider()
    {
        return [
            [
                'mangé',
                'manger'
            ],
            [
                'eu',
                'avoir'
            ],
            [
                'reu',
                'ravoir'
            ],
            [
                'été',
                'être'
            ],
            
            [
                'agacé',
                'agacer'
            ],
            [
                'dû',
                'devoir'
            ],
            [
                'mû',
                'mouvoir'
            ],
            [
                'autopromû',
                'autopromouvoir'
            ],
            [
                'pu',
                'pouvoir'
            ],
            [
                'aperçu',
                'apercevoir'
            ],            
            [
                'redu',
                'redevoir'
            ],
            [
                'dû',
                'devoir'
            ],
            [
                'vu',
                'voir'
            ],
            [
                'pourvu',
                'pourvoir'
            ],
            [
                'prévu',
                'prévoir'
            ],
            [
                'valu',
                'valoir'
            ],
            [
                'fui',
                'fuir'
            ],
            [
                'tenu',
                'tenir'
            ],
            [
                'sailli',
                'saillir'
            ],
            [
                'bouilli',
                'bouillir'
            ],
            [
                'su',
                'savoir'
            ],
            [
                'resu',
                'resavoir'
            ],
            [
                'couvert',
                'couvrir'
            ],
            [
                'couru',
                'courir'
            ],
            [
                'mort',
                'mourir'
            ],
            [
                'remort',
                'remourir'
            ],
            [
                'acquis',
                'acquérir'
            ],
            [
                'vêtu',
                'vêtir'
            ]
        ];
    }
}
?>