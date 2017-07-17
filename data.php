<?php
/**
 * Created by PhpStorm.
 * User: stan
 * Date: 14.07.17
 * Time: 23:12
 */
// что произойдёт 2038?????
/*
1. Определите:
- сколько минут осталось до Нового года
- сколько секунд осталось до конца лета
- сколько часов осталось до следующего понедельника
*/
date_default_timezone_set('Europe/Kiev');

//$today=strtotime("now");
$today=time();
$new_year=strtotime("2018-01-01");
$end_summer=strtotime("1 September 2017");
//$end_summer=strtotime("2017-09-01");
$next_monday=strtotime("next monday");

$to_ny=intval(($new_year-$today)/60);
//intval — Возвращает целое значение переменной
$to_end_summer=$end_summer-$today;
$to_monday=round(($next_monday-$today)/3600);
//round — Округляет число типа float

echo '1.';
echo "До Нового Года осталось: ".$to_ny." минут.\n";
echo "До конца лета осталось: ".$to_end_summer." секунд.\n";
echo "До следующего понедельника осталось: ".$to_monday." часов.\n";
/*
 2. Определите сколько секунд Виктор Янукович был президентом?
(вступил в должность 25 февраля 2010, покинул пост
22 февраля 2014)
 */
$janik_start = new DateTime('25 Feb 2010');
$janik_end = new DateTime('22 Feb 2014');
$sec_president = $janik_end->getTimestamp() - $janik_start->getTimestamp();
echo '2.';
echo 'Янык был презиком: ' . $sec_president . " секунд.\n";
/*
3. Необходимо написать функцию (будет в качестве аргумента
принимать год) и подсчитывать количество понедельников, на
которые выпало 21 июня, за 10 лет до соответствующего года

Например, 2009 год - аргумент. Необходимо посчитать количество
 понедельников, на которые выпало 21 июня с 2009 по 1999 год.
 */
function mon_21($year)
{
    $monday = 0;
    for ($i = $year - 10; $i <= $year; $i++) {
        $year_monday = '21-06-' . $i;
        //$year_monday = '21 June' . $i;
        $day = (getdate(strtotime($year_monday)));
        if ($day['wday'] == '1') {
            //if ($day['weekday'] == 'Monday') {
            $monday++;
            echo $year_monday . "\n";
        }
    }
    return 'Количество понедельников на 21 июля составило: ' . $monday . ".\n";
}

echo '3.';
echo mon_21(2010);
/*
 4. Необходимо написать функцию, которая будет в качестве значения
 принимать год и определять в какой день недели в этом году у
 вас день рождения
 */
function my_bd($year)
{
    $birtday = "17-01-" . $year;
    $birtday = strtotime($birtday);
    $day = getdate($birtday);
    //$day = (getdate(strtotime("17 Jan " . $year)));
    //$find = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    //$replace = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');
    //$weekday = str_replace($find, $replace, $date['weekday']);
    $dayRus = ['Monday' => 'Понедельник',
        'Tuesday' => 'Вторник',
        'Wednesday' => 'Среду',
        'Thursday' => 'Четверг',
        'Friday' => 'Пятницу',
        'Saturday' => 'Субботу',
        'Sunday' => 'Воскресенье',
    ];
    return 'День рождения выпал на: ' . $dayRus[$day['weekday']] . ".\n";
}

echo '4.';
echo my_bd(2017);
/*
5. Определите количество високосных годов, которые вы прожили за жизнь
*/
function leap_year($year)
{
    $my_year = date('Y');
    $count = 0;
    for ($i = $year; $i <= $my_year; $i++) {
        //'L' Признак високосного года 1, если год високосный, иначе 0.
        if (date('L', strtotime('01-01-' . $year)) == 1) {
            $count++;
        }
        $year++;
    }
    return $count;
}

echo '5.';
echo 'Высокосных годов в жизни было: ' . leap_year(1986) . ".\n";
/*
6. Необходимо написать функцию, которая будет принимать в качестве
аргумента время в часах и минутах и возвращать массив, состоящий из
 двух значений - разница во времени с Нью-Йорком и разница во времени
 с Токио
*/



echo '6.';
/*
7. Необходимо написать функцию (в качестве аргумента принимает год),
 которая будет определять количество 13 пятниц в году
*/
function friday13($year)
{
    $friday = 0;
    for ($i = 0; $i <= 12; $i++) {
        $count = getdate(mktime(0, 0, 0, $i, 13, $year));
        if ($count['weekday'] == 'Friday') {
            $friday++;
        }
    }
    return "На " . $year . " год, пятниц 13 перепало: " . $friday . ".\n";
}

echo '7.';
echo friday13(2017);

//$count = strtotime("13-$i-$year");
//if (date('w', $count) == 5)
//echo "есть в $i месяце, ";
?>