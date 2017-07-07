<?php
/**
 * Created by PhpStorm.
 * User: stan
 * Date: 24.06.17
 * Time: 0:37
 */


$discography = array(
    array('id' => '12','year' => '1994','band' => 'Pink Floyd','genre' => 'rock','name' => 'Division Bell','count_songs' => '10'),
    array('id' => '13','year' => '1989','band' => 'Nirvana','genre' => 'grunge','name' => 'Bleach','count_songs' => '11'),
    array('id' => '14','year' => '1991','band' => 'Nirvana','genre' => 'grunge','name' => 'Nevermind','count_songs' => '13'),
    array('id' => '15','year' => '1993','band' => 'Nirvana','genre' => 'grunge','name' => 'In Utero','count_songs' => '12'),
    array('id' => '16','year' => '1991','band' => 'Pearl Jam','genre' => 'grunge','name' => 'Ten','count_songs' => '12'),
    array('id' => '17','year' => '1993','band' => 'Pearl Jam','genre' => 'grunge','name' => 'Vs.','count_songs' => '10'),
    array('id' => '18','year' => '1994','band' => 'Pearl Jam','genre' => 'grunge','name' => 'Vitalogy','count_songs' => '12'),
    array('id' => '19','year' => '1996','band' => 'Pearl Jam','genre' => 'grunge','name' => 'No Code','count_songs' => '9'),
    array('id' => '20','year' => '1993','band' => 'Radiohead','genre' => 'rock','name' => 'Pablo Honey','count_songs' => '12'),
    array('id' => '21','year' => '1995','band' => 'Radiohead','genre' => 'rock','name' => 'The Bends','count_songs' => '12'),
    array('id' => '22','year' => '1997','band' => 'Radiohead','genre' => 'rock','name' => 'OK Computer','count_songs' => '1997'),
    array('id' => '23','year' => '2000','band' => 'Radiohead','genre' => 'rock','name' => 'Kid A ','count_songs' => '14'),
    array('id' => '24','year' => '1994','band' => 'Portishead','genre' => 'trip-hop','name' => 'Dummy','count_songs' => '8'),
    array('id' => '25','year' => '1997','band' => 'Portishead','genre' => 'trip-hop','name' => 'Portishead','count_songs' => '9'),
    array('id' => '26','year' => '1991','band' => 'Massive Attack','genre' => 'trip-hop','name' => 'Blue Lines','count_songs' => '12'),
    array('id' => '27','year' => '1994','band' => 'Massive Attack','genre' => 'trip-hop','name' => 'Protection','count_songs' => '15'),
    array('id' => '28','year' => '1998','band' => 'Massive Attack','genre' => 'trip-hop','name' => 'Mezzanine','count_songs' => '9'),
    array('id' => '29','year' => '1995','band' => 'Tricky','genre' => 'trip-hop','name' => 'Maxinquaye','count_songs' => '11'),
    array('id' => '30','year' => '1998','band' => 'Tricky','genre' => 'trip-hop','name' => 'Angels with Dirty Faces','count_songs' => '10'),
    array('id' => '31','year' => '1993','band' => 'The Roots','genre' => 'hip-hop','name' => 'Organix!','count_songs' => '11'),
    array('id' => '32','year' => '1995','band' => 'The Roots','genre' => 'hip-hop','name' => 'From the Ground Up','count_songs' => '13'),
    array('id' => '33','year' => '1996','band' => 'The Roots','genre' => 'hip-hop','name' => 'Illadelph Halflife','count_songs' => '15'),
    array('id' => '34','year' => '1999','band' => 'The Roots','genre' => 'hip-hop','name' => 'Things Fall Apart','count_songs' => '14'),
    array('id' => '35','year' => '1999','band' => 'The Roots','genre' => 'hip-hop','name' => 'The Legendary','count_songs' => '7'),
    array('id' => '36','year' => '1994','band' => 'Oasis','genre' => 'rock','name' => 'Definitely Maybe','count_songs' => '12'),
    array('id' => '37','year' => '1995','band' => 'Oasis','genre' => 'rock','name' => '(What\'s the Story) Morning Glory?','count_songs' => '11'),
    array('id' => '38','year' => '1997','band' => 'Oasis','genre' => 'rock','name' => 'Be Here Now','count_songs' => '10'),
    array('id' => '39','' => '2000','band' => 'Oasis','genre' => 'rock','name' => 'Standing on the Shoulder of Giants','count_songs' => '13')
);

//1) Необходимо посчитать кол-во жанров

$all_genre=array();
foreach ($discography as $value){
      $all_genre[$value['genre']]=$value['genre'];
}
echo "1.Количество жанров: ".count($all_genre)."<br/>\n";

//2) Необходимо посчитать кол-во исполнителей
$all_band=array();
foreach ($discography as $value){
    $all_band[]=$value['band'];
}
$all_band=array_unique($all_band);
echo "2.Количество исполнителей: ".count($all_band)."<br />\n";

//3) Необходимо удалить все альбомы, датированные 2000-ым годом
$no_2000=array();

foreach ($discography as $key => $value){

    if (isset($value['year']) && $value['year'] =='2000'){
       unset($discography[$key]);
    }
}

//4) Необходимо посчитать количество всех альбомов в жанре trip-hop
$genre_th=array();
 foreach ($discography as $key => $value) {
     if ($value['genre'] == 'trip-hop')
         $genre_th[] = $value['genre'];
 }

echo "<br/>\n 4.Количество альбомов в жанре trip-hop :".count($genre_th)."<br/>\n";

//5) Необходимо посчитать количество всех исполнителей, которые выпускали альбомы в 1994 году
$i=0;
foreach ($discography as $key => $value) {
    if( isset( $value['year'] ) && $value['year'] == '1994') {
        $i++;
    }
}
unset($value);
echo "<br/>\n 5.Количество всех исполнителей, которые выпускали альбомы в 1994 году: ". $i ."<br/>\n";

//6) Необходимо определить альбом с наибольшим и наименьшим количеством композиций и вывести эти две цифры

$album_song=array();
foreach ($discography as $value){
    $album_song[$value['name']]=$value['count_songs'];
}
asort($album_song);
$sort=array_keys($album_song);
echo '6. <br/>\n';
echo 'Альбом с наименьшим кол-вом песен: ' . $sort[0].'<br/>\n ';
echo 'Альбом с наибольшим кол-вом песен: ' . end($sort).'<br/>\n';

//7) Необходимо преобразить массив, сгруппировав данные в определенной иерархии
$new_discography=array();
  foreach ($discography as $value){
       $bn_key=$value['band'] . '+' . $value['name'];

       if (!isset($value['year'])) {
           var_dump($value);die;
       }

       $new_discography[$value['year']][$value['genre']][$bn_key]=$value['count_songs'];

  }
    print_r($new_discography);


?>
