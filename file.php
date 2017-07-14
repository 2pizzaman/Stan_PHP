<?php
/**
 * Created by PhpStorm.
 * User: stan
 * Date: 14.07.17
 * Time: 0:30
 */

/*1. Необходимо написать функцию, которая будет в качестве аргумента
будет принимать путь к папке, в которой есть файлы или другие папки,
и анализировать содержимое данной папки. Результаты сканирования
необходимо записывать в новый файл - scan_results.txt.

Вид результатов в файле scan_results.txt должен быть таким:

1 | Наименование файла | Тип файла (Файл или папка) | Расширение файла | Размер файла |
2 | Наименование файла | Тип файла (Файл или папка) | Расширение файла | Размер файла |
3 | Наименование файла | Тип файла (Файл или папка) | Расширение файла | Размер файла |
*/
$pyt = '/var/www/html/PROJECTION/PROJECT_PHP/';
function skanDir($way)
{
    if (!is_dir($way)) {
        return "функция принимает только путь к папке в качестве аргумента!";
    }
    $arrElem = scandir($way);//получили содержимое
    $resultat = $way . 'scan_resultats.txt';//переделать на раб папку
    $fp = fopen($resultat, 'w');// открываем файл для записи
    //$data = '';
    foreach ($arrElem as $key => $value) {
        switch ($value) {
            case ($value == '.'):
            case ($value == '..'):
                continue;
            case (is_file($value)):
                $pathinfo = pathinfo($value);
                $data = $key . ' | ' . $value . ' | ' . filetype($value) . ' | ' . $pathinfo["extension"] . ' | ' . filesize($value) . ' | ' . "\n";
                break;
            case (is_dir($value)):
                $data = $key . ' | ' . $value . ' | ' . filetype($value) . ' | ' . "\n";
                break;
            default:
                break;
        }
        if (isset($data)) {
            fwrite($fp, $data);
        }
    }
    fclose($fp);
}

skanDir($pyt);

/*2. Необходимо написать функцию, которая в качестве аргументов будет принимать путь к папке, в которой есть файлы или другие папки, и возможное действие с содержимым (удаление, перемещение). Третьем необязательным аргументом должен стать путь к новой папке, в которую необходимо перемещать содержимое текущий папки (данный аргумент передаётся и используется только для действия перемещение).

Если действие удаление, то мы должно удалять содержимое папки, включая её внутренние файлы и папки.
Если действие перемещение, то мы должны перемещать содержимое папки, в новую папку.
*/

$pyt = '/var/www/html/PROJECTION/PROJECT_PHP/';
$papo4ka = '/home/stan/my_papo4ka/';

function actWithFiles($way, $action, $newWayFolder = null)
{
    $content = array_diff(scandir($way), ['.', '..']);//получаем содержимое папки массивом

    //scandir — Получает список файлов и каталогов, расположенных по указанному пути
    //array_diff — Вычислить расхождение массивов
    if ($action == 'otpravit') {
        foreach ($content as /*$key=>*/
                 $value) {
            $arrName = explode('/', $way);
            $name = $newWayFolder . $arrName[count($arrName) - 2];
            if (!file_exists($name)) {
                mkdir($name);
            }
            rename($way . '/' . $value, $name . '/' . $value);
            print_r($name);
        }
    } elseif ($action == 'del') {
        $content = array_diff(scandir($way), ['.', '..']);
        if (is_dir($way)) {
            foreach ($content as /*$key=>*/
                     $value) {
                if (is_dir($way . '/' . $value)) {
                    actWithFiles($way . '/' . $way, 'del');
                } else {
                    unlink($way . '/' . $value);//unlink — Удаляет файл
                }
                rmdir($way . '/' . $value);//rmdir — Удаляет директорию
            }
        }
    }
}

actWithFiles($papo4ka, 'otpravit', $pyt);

/*3. Необходимо написать функцию, которая будет в качестве аргумента
принимать ссылку на изображение в интернете, и сохранять его на
 жесткий диск.
*/
$url = 'http://www.radioroks.ua/static/img/stock/0/93/mainImage.jpg';

function copyPictures($image_url)
{
    /*
    $arrWay=explode('.',$image_url);
    $type=$arrWay[count($arrWay)-1];
    $arrName=explode('/',$arrWay[count($arrWay)-2]);
    */
    $arrName = explode('/', $image_url);
    $name = end($arrName);

    $dir = 'kartinki';
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    if (!file_exists($dir . '/' . $name . '.' . $type)) {
        copy($image_url, $dir . '/' . $name . '.' . $type);
    } else {
        echo 'ты его уже скачал, что ещё надо??';
    }
    /*if (!file_exists($arrWay)) {
        $image_data = file_get_contents($image_url);
        file_put_contents($arrWay, $image_data);
    }*/
}

copyPictures($url);

/*4. Необходимо написать функцию, которая будет в качестве аргумента
принимать ссылку на какой-то сайт. Функция должна определять следующую
 информацию:
-1. количество html-тегов <h1>, содержащихся на этой странице
-2. содержимое, заключенное внутрь hmtl-тега <title></title>
-3. количество символов, которые занимают html-теги в содержимом страницы
*/

$site2 = "http://project260218.tilda.ws/lecture7";
$file = "/var/www/html/PROJECTION/PROJECT_PHP/scan_resultats.txt";

function scan_link($site, $a)
{
    $fopen = fopen($a, 'a+');
    $site_contents = file_get_contents($site);

    $count_h1 = substr_count($site_contents, '<h1>');
    $temp1 = "\nТэгов: <h1>" . $count_h1 . " раз.";

    $title_start = explode('<title>', $site_contents);
    unset($title_start[0]);
    $title = implode('', $title_start);
    $title_end = explode('</title>', $title);
    unset($title_end[1]);
    $temp2 = "\n\nВ <title> на сайте заключенно: '" . $title_end[0] . "'";

    $count_tag = strip_tags($site_contents);
    $count_site = mb_strlen($count_tag);
    $count_contens = mb_strlen($site_contents);
    $count_all = $count_contens - $count_site;
    $temp3 = "\n\nКоличество символов тэгов:" . $count_all . ' шт.';

    $temp = $temp1 . $temp2 . $temp3;

    if (isset($temp)) {
        fwrite($fopen, $temp);
    }
    fclose($fopen);
}

scan_link($site2, $file);

?>