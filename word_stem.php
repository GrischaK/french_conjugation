<?php

function word_stem_length(InfinitiveVerb $infinitiveVerb, $endingLength)
{
    return mb_substr($infinitiveVerb->getInfinitiveVerb(), 0, - $endingLength);
}

function word_stem_only_first_letter(InfinitiveVerb $infinitiveVerb)
{
    $word_stem = word_stem_length($infinitiveVerb, 2);
    $word_stem = mb_substr($word_stem, 0, 1);
    return $word_stem;
}

function replace_akut($str, $replace, $replaceWith)
{
    $exp = explode($replace, $str);
    
    $i = 1;
    $cnt = count($exp);
    $format_str = '';
    foreach ($exp as $v) {
        if ($i == 1) {
            $format_str = $v;
        } else 
            if ($i == $cnt) {
                $format_str .= $replaceWith . $v;
            } else {
                $format_str .= $replace . $v;
            }
        $i ++;
    }
    return $format_str;
}

function word_stem(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood)
{
  
    if ($exceptionIsFUIR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 1);
    }
    if ($exceptionIsDEVOIR
        || $exceptionIsMOUVOIR
        || $exceptionIsPOUVOIR
        || $exceptionIsSAVOIR
        || $exceptionIsVALOIR
        || $exceptionIsCEVOIR        
        || $exceptionIsAVOIR_IRR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    if ($exceptionIsETRE_IRR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    
    if (($exceptionIsEler_Ele || $exceptionIsEter_Ete)
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || $tenseIsFutur
            || ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = substr_replace($word_stem, 'è', - 2, 1);
    }
    if (($exceptionIsEler_Elle || $exceptionIsEter_Ette)
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || $tenseIsFutur
            || ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'l') {
            $word_stem = $word_stem . 'l';
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 't') {
            $word_stem = $word_stem . 't';
        }
    }
    if (($exceptionIsCER || $exceptionIsGER || $exceptionIsE_Akut_CER || $exceptionIsE_Akut_GER)
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1P)
            || ($moodIsIndicatif && $tenseIsImparfait && $personIs_1S_2S_3S_3P)
            || ($moodIsIndicatif && $tenseIsPasse && $personIs_1S_2S_3S_1P_2P)
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_1P)))
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c') {
            $word_stem = substr_replace($word_stem, 'ç', - 1);
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g') {
            $word_stem = $word_stem . 'e';
        }
    } 
    if (($exceptionIsE_Akut_ER || $exceptionIsE_Akut_CER || $exceptionIsE_Akut_GER || $exceptionIsE_Akut_YER)
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsFutur
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = replace_akut($word_stem, 'é', 'è');
    }    
    if ($exceptionIsE_Er
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsFutur
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = replace_akut($word_stem, 'e', 'è');
    } 
    if ($exceptionIsMOURIR 
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5) . 'eur';
    }   
    if ($exceptionIsBOUILLIR
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P) 
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if ($exceptionIsQUERIR
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionIsQUERIR
        && (   ($moodIsIndicatif && $tenseIsFutur)
            || ($moodIsConditionnel && $tenseIsPresent)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'er';
    }    
    if ($exceptionIsENVOYER
        && (   ($moodIsIndicatif && $tenseIsFutur)
            || ($moodIsConditionnel && $tenseIsPresent)))
    {
        $word_stem = substr_replace($word_stem, 'enver', - 5, 5);
    }
    if ($exceptionIsENVOYER
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = substr_replace($word_stem, 'i', - 1);
    }
    if ($exceptionIsVALOIR
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S)
            || $tenseIsFutur
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'u';
    }
    
    if ($exceptionIsVALOIR
        && ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'ill';
    }
    if ($exceptionIsDEVOIR
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsPasse        
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }    
    if ($exceptionIsMOUVOIR
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsPasse
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }   
    if ($exceptionIsCEVOIR
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsPasse
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 6).'ç';
    }    
    
    if (($exceptionIsDORMIR || $exceptionIsTIR || $exceptionIsSERVIR)
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S) 
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    } 

    if ($exceptionIsPOUVOIR
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P) 
            || $tenseIsPasse            
            || ($moodIsSubjonctif && $tenseIsImparfait)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }
    
    if ($exceptionIsPOUVOIR
        && (   ($moodIsIndicatif && $tenseIsFutur)
            || ($moodIsConditionnel && $tenseIsPresent)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, 'r', - 1);
    }
    if ($exceptionIsSAVOIR
        && (   ($moodIsIndicatif && $tenseIsFutur)
            || ($moodIsConditionnel && $tenseIsPresent)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, 'u', - 1);
    }
    
    if ($exceptionIsPOUVOIR
        && ($moodIsSubjonctif && $tenseIsPresent))
    {
       $word_stem = word_stem_length($infinitiveVerb, 6) . 'uiss';
        // unset Imperatif Present later
    }    
    if ($exceptionIsSAVOIR
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S)
            || $tenseIsPasse
            || ($moodIsSubjonctif && $tenseIsImparfait)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if ($exceptionIsSAVOIR
        && (   ($moodIsSubjonctif && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, 'ch', - 1);
    }  
    if ($exceptionIsVOIR
        && (   ($moodIsIndicatif && $tenseIsPasse)
            || ($moodIsSubjonctif && $tenseIsImparfait)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    if ($exceptionIsENIR
        && (   ($moodIsIndicatif && $tenseIsPasse)
            || ($moodIsSubjonctif && $tenseIsImparfait)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionIsENIR
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsFutur
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'ien';
    }   
    if ($exceptionIsALLER
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsFutur
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    if ($exceptionIsAVOIR_IRR
        && (   (($moodIsIndicatif || $moodIsSubjonctif || $moodIsConditionnel || $moodIsImperatif) && $tenseIsPresent ) // summarized 4 lines
            || $tenseIsPasse
            || $tenseIsFutur
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsConditionnel && $tenseIsPresent)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if (($exceptionIsFUIR || $exceptionIsVOIR)
        && (   (($moodIsIndicatif || $moodIsSubjonctif || $moodIsImperatif) && $tenseIsPresent && $personIs_1P_2P) // summarized 3 lines
            || ($moodIsIndicatif && $tenseIsImparfait)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 2) . 'y';
    }
    if ($exceptionIsVOIR
        && (   ($moodIsIndicatif && $tenseIsFutur)
            || ($moodIsConditionnel)))
    {
    if (in_array($infinitiveVerb, [
            'pourvoir',
            'prévoir'
        ])) {
            $word_stem = word_stem_length($infinitiveVerb, 3) . 'oi';
        } else
            $word_stem = word_stem_length($infinitiveVerb, 3) . 'er';
    }  
    return $word_stem;
}

function participe_present_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // without this line Undefined variable

    $exceptionIsCER = $exceptionmodel->getValue() === ExceptionModel::CER;
    $exceptionIsGER = $exceptionmodel->getValue() === ExceptionModel::GER;
    $exceptionIsDEVOIR = $exceptionmodel->getValue() === ExceptionModel::DEVOIR;
    $exceptionIsMOUVOIR = $exceptionmodel->getValue() === ExceptionModel::MOUVOIR;
    $exceptionIsPOUVOIR = $exceptionmodel->getValue() === ExceptionModel::POUVOIR;
    $exceptionIsSAVOIR = $exceptionmodel->getValue() === ExceptionModel::SAVOIR;
    $exceptionIsVALOIR = $exceptionmodel->getValue() === ExceptionModel::VALOIR;
    $exceptionIsSAVOIR = $exceptionmodel->getValue() === ExceptionModel::SAVOIR;
    $exceptionIsVALOIR = $exceptionmodel->getValue() === ExceptionModel::VALOIR;
    $exceptionIsVOIR= $exceptionmodel->getValue() === ExceptionModel::VOIR;
    $exceptionIsFUIR = $exceptionmodel->getValue() === ExceptionModel::FUIR;
    $exceptionIsAVOIR_IRR = $exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR;
    $exceptionIsETRE_IRR = $exceptionmodel->getValue() === ExceptionModel::ETRE_IRR;
    $exceptionIsMOURIR = $exceptionmodel->getValue() === ExceptionModel::MOURIR;
    $exceptionIsQUERIR = $exceptionmodel->getValue() === ExceptionModel::QUERIR;
    $exceptionIsDORMIR = $exceptionmodel->getValue() === ExceptionModel::DORMIR;
    $exceptionIsTIR = $exceptionmodel->getValue() === ExceptionModel::TIR;
    $exceptionIsSERVIR = $exceptionmodel->getValue() === ExceptionModel::SERVIR;
    $exceptionIsCEVOIR = $exceptionmodel->getValue() === ExceptionModel::CEVOIR;

  
    if ($exceptionIsCER || $exceptionIsGER)
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c') {
            $word_stem = substr_replace($word_stem, 'ç', - 1);
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g') {
            $word_stem = $word_stem . 'e';
        }
    }
    
    if ($exceptionIsDEVOIR || $exceptionIsMOUVOIR || $exceptionIsPOUVOIR || $exceptionIsSAVOIR || $exceptionIsCEVOIR || $exceptionIsVALOIR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    
    if ($exceptionIsETRE_IRR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionIsAVOIR_IRR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    if ($exceptionIsFUIR || $exceptionIsVOIR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 2) . 'y';
    }
    if ($exceptionIsDORMIR || $exceptionIsTIR || $exceptionIsSERVIR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }      
    return $word_stem;
}

function participe_passe_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // regular case

    $exceptionIsRIR = $exceptionmodel->getValue() === ExceptionModel::RIR;    
    $exceptionIsDEVOIR = $exceptionmodel->getValue() === ExceptionModel::DEVOIR;
    $exceptionIsMOUVOIR = $exceptionmodel->getValue() === ExceptionModel::MOUVOIR;
    $exceptionIsPOUVOIR = $exceptionmodel->getValue() === ExceptionModel::POUVOIR;
    $exceptionIsVALOIR = $exceptionmodel->getValue() === ExceptionModel::VALOIR;
    $exceptionIsSAVOIR = $exceptionmodel->getValue() === ExceptionModel::SAVOIR;
    $exceptionIsVALOIR = $exceptionmodel->getValue() === ExceptionModel::VALOIR;
    $exceptionIsCEVOIR = $exceptionmodel->getValue() === ExceptionModel::CEVOIR;
    $exceptionIsVOIR= $exceptionmodel->getValue() === ExceptionModel::VOIR;
    $exceptionIsAVOIR_IRR = $exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR;
    $exceptionIsETRE_IRR = $exceptionmodel->getValue() === ExceptionModel::ETRE_IRR;
    $exceptionIsQUERIR = $exceptionmodel->getValue() === ExceptionModel::QUERIR;
    $exceptionIsMOURIR = $exceptionmodel->getValue() === ExceptionModel::MOURIR;    
    
    if ($exceptionIsRIR || $exceptionIsVALOIR || $exceptionIsVOIR)    
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    
    if ($exceptionIsETRE_IRR || $exceptionIsQUERIR)    
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionIsCEVOIR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 6).'ç';
    }
    if ($exceptionIsDEVOIR || $exceptionIsMOURIR || $exceptionIsAVOIR_IRR || $exceptionIsSAVOIR)
    {   

        $word_stem = word_stem_length($infinitiveVerb, 5);
    } 
    if ($exceptionIsMOUVOIR || $exceptionIsPOUVOIR)
    {    
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }
    return $word_stem;
}
?>