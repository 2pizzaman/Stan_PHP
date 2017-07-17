<?php
/**
 * Created by PhpStorm.
 * User: stan
 * Date: 30.06.17
 * Time: 12:45
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*1. Необходимо вывести на экран строку с количеством товаров следующего вида: "N товаров", где N - количество товаров.
 Нужно написать функцию, которая будет формировать строку с выводом в правильном склонении в зависимости от числа.

Аргументом у такой функции будет число и в зависимости от этого числа должно определяться правильное склонение слова
"товар". Например, в функцию передаём число 3, результатом должен быть вывод "3 товара". Передаём число 31, результатом
 будет "31 товар". */
echo '1.<br/>\n';
for ($numer = 0; $numer < 202; $numer++)
    echo "\nКоличество: " . kolich($numer);


function kolich($numer)
{
    $tovar = array('Товаров нет', 'Слишком много выбрано', 'товар', 'товара', 'товаров');

    if ($numer <= 0) {
        echo $numer . ' ' . $tovar[0];
    } elseif ($numer >= 201) {
        echo "n\ " . $numer . ' ' . $tovar[1];
    } elseif (($numer == 1 || $numer % 10 == 1) && ($numer != 11 && $numer != 111)) {
        echo $numer . ' ' . $tovar[2];
    } elseif (($numer == 2 || $numer == 3 || $numer == 4 || $numer % 10 == 2 || $numer % 10 == 3 || $numer % 10 == 4) &&
        ($numer != 12 && $numer != 13 && $numer != 14 && $numer != 112 && $numer != 113 && $numer != 114)
    ) {
        echo $numer . ' ' . $tovar[3];
    } else {
        echo $numer . ' ' . $tovar[4];
    }
}


//2. Необходимо написать функцию, которая будет в аргументе принимать строку и переворачивать её (делать зеркальной)
// и возвращать полученный результат. При этом нельзя использовать стандартную функцию PHP strrev .
echo '<br/>\n2.<br/>\n';
function strBack($string)
{
    if (is_string($string)) {
        $strLength = mb_strlen($string);
        $newStr = "";
        for ($i = $strLength; $i >= 0; $i--) {
            $newStr .= mb_substr($string, $i, 1);
        }
        return $newStr . "<br/>\n";
    } else {
        return "работает только со строками<br/>\n";
    }
}

$str_work = "qwerty, всё работает";
echo '<br/>\n' . strBack($str_work) . '<br/>\n';
//echo $proverka=strBack($str_work);
//echo '<br/>\n'.strBack($proverka).'<br/>\n';


//3. Необходимо написать функцию, которая будет работать аналогично функции PHP array_unique
echo '3.<br/>\n';
$testovij = array(1, 2, 2, 3, 5, 7, 8, 7, 5);

function uniq_array($arr)
{
    $itog = array();
    foreach ($arr as $key => $value) {
        if (!in_array($value, $itog)) {
            $itog[$key] = $value;
        }
    }
    return $itog;
}

var_dump(uniq_array($testovij));
echo '<br/>\n';


//4. Необходимо написать функцию, которая будет работать аналогично функции PHP array_chunk
echo '4.<br/>\n';

function chunk($arr, $dif)
{
    $temp = array();
    $count = 0;
    $index = 0;
    foreach ($arr as $key => $value) {
        $temp[$index][$key] = $value;
        $count++;
        if ($count == $dif) {
            $count = 0;
            $index++;
        }
    }
    return $temp;
}

var_dump(chunk($testovij, 4));
echo '<br/>\n';

//5. Необходимо написать функцию, которая будет работать аналогично функции PHP array_diff
echo '5.<br/>\n';
$colors1 = array('red', 'green', 'blue', 'red', 'yellow', 'broun');
$colors2 = array('red', 'green', 'blue', 'red', 'grey');

function arr_diff($arr1 = array(), $arr2 = array())
{
    $array_diff = array();

    foreach ($arr1 as $key => $value) {
        if (!in_array($value, $arr2)) {
            $array_diff[$key] = $value;
        }
    }
    return $array_diff;
}

var_dump(arr_diff($colors1, $colors2));
echo '<br/>\n';
var_dump(arr_diff($colors2, $colors1));
echo '<br/>\n';

//6. Необходимо написать функцию, которая будет преобразовывать строку Фамилия Имя Отчество в краткую запись Фамилия И.О.
echo '6.<br/>\n';
$user_name = 'Щукин станислав олегович';
function name_io($name)
{
    if (is_string($name)) {
        trim($name);
        $io = explode(' ', $name);
        $new_name = $io[0];
        $new_name .= ' ' . mb_strtoupper(mb_substr($io[1], 0, 1)) . '. ' . mb_strtoupper(mb_substr($io[2], 0, 1)) . '.';
        return $new_name;
    }
    echo 'Введите коректное имя: ';
}

echo 'Инициалы: ' . name_io($user_name);


/*7. Необходимо написать функцию, которая будет определять мобильного оператора, исходя из полученного номера телефона
Формат мобильного телефона: +380ХХ9999999
Операторы: 097 - Киевстар, 099 - Vodafone, 093 - Lifecell
Например, передаём в функцию строку +380991111111, функция возвращает "Vodafone"
*/
echo '7.<br/>\n';
function mob_operator($number)
{
    $kod = array(
        'mts' => array('50', '99', '95'),
        'life' => array('93', '63', '73'),
        'ks' => array('97', '67', '68', '98')
    );
    $number_kod = trim($number);
    $number_kod = mb_substr($number, 4, 6);

    foreach ($kod as $key => $value) {
        if ($number_kod = $value) {
            $operator_kod = $key;
            break;
        }
        echo 'vved nomer ';
    }
    echo $operator_kod;
}

echo mob_operator(+3805012345678);

?>