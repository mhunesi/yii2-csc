<?php

use yii\db\Migration;

/**
 * Class m221206_081748_turkey_state_city_refactoring
 */
class m221206_081748_turkey_state_city_refactoring extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = <<<SQL
            UPDATE city SET state_id = (SELECT id FROM state WHERE country_code = 'TR' AND name = 'Elazığ'), state_code = '23' WHERE name = 'Alacakaya İlçesi' AND state_code = '21' AND country_code = 'TR';
UPDATE city SET name = 'Merkez' WHERE name = 'Khanjarah' AND country_code = 'TR' AND state_code = '18';
UPDATE city SET name = 'Samandağ' WHERE name = 'Samankaya' AND country_code = 'TR' AND state_code = '31';
UPDATE city SET name = 'Merkez' WHERE name = 'Mardin Merkez' AND country_code = 'TR' AND state_code = '47';
UPDATE city SET name = 'Gümüşhane' WHERE name = 'Gumushkhane' AND country_code = 'TR' AND state_code = '29';

DELETE FROM city WHERE state_code = '09' AND country_code = 'TR' AND name = 'Acarlar';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Acırlı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Akarsu';
DELETE FROM city WHERE state_code = '33' AND country_code = 'TR' AND name = 'Akdere';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Akdiken';
DELETE FROM city WHERE state_code = '20' AND country_code = 'TR' AND name = 'Akkent';
DELETE FROM city WHERE state_code = '20' AND country_code = 'TR' AND name = 'Akköy';
DELETE FROM city WHERE state_code = '58' AND country_code = 'TR' AND name = 'Aksu';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Alakamış';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Alanyurt';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Alaçatı';
DELETE FROM city WHERE state_code = '06' AND country_code = 'TR' AND name = 'Altpınar';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Altınkum';
DELETE FROM city WHERE state_code = '10' AND country_code = 'TR' AND name = 'Altınoluk';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Ambar';
DELETE FROM city WHERE state_code = '32' AND country_code = 'TR' AND name = 'Anamas';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Anayazı';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Andaç';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Aralık';
DELETE FROM city WHERE state_code = '02' AND country_code = 'TR' AND name = 'Aralık İlçesi';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Aran';
DELETE FROM city WHERE state_code = '09' AND country_code = 'TR' AND name = 'Atça';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Avine';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Aviski';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Avsallar';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Aydınkonak';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Açıkdere';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Aşağı Beğdeş';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Aşağı Karafakılı';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Aşağıokçular';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Bademli';
DELETE FROM city WHERE state_code = '01' AND country_code = 'TR' AND name = 'Bahçe';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Bahçecik';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Balarim';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Ballı';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Balpınar';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Balveren';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Balçık';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Balıklıdere';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Baraniferho';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Barıştepe';
DELETE FROM city WHERE state_code = '06' AND country_code = 'TR' AND name = 'Batikent';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Bayır';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Bağlıca';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Bağlıca';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Başaran';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Başkavak';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Becuh';
DELETE FROM city WHERE state_code = '17' AND country_code = 'TR' AND name = 'Behram';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Belek';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Belevi';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Beykonak';
DELETE FROM city WHERE state_code = '06' AND country_code = 'TR' AND name = 'Beypazari';
DELETE FROM city WHERE state_code = '13' AND country_code = 'TR' AND name = 'Beğendik';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Beşpınar';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Binatlı';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Bisbin';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Bostancı';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Boyalıca';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Boynuyoğun';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Bozalan';
DELETE FROM city WHERE state_code = '26' AND country_code = 'TR' AND name = 'Bozan';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Bozarmut';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Boğazkent';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Boğazören';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Bulutlu';
DELETE FROM city WHERE state_code = '64' AND country_code = 'TR' AND name = 'Bölme';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Büyük Dalyan';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Büyükçat';
DELETE FROM city WHERE state_code = '46' AND country_code = 'TR' AND name = 'Celeyke';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Cerrah';
DELETE FROM city WHERE state_code = '42' AND country_code = 'TR' AND name = 'Cihanbeyli District';
DELETE FROM city WHERE state_code = '24' AND country_code = 'TR' AND name = 'Cimin';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Cinatamiho';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Civankan';
DELETE FROM city WHERE state_code = '09' AND country_code = 'TR' AND name = 'Dalama';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Dalyan';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Dara';
DELETE FROM city WHERE state_code = '09' AND country_code = 'TR' AND name = 'Davutlar';
DELETE FROM city WHERE state_code = '05' AND country_code = 'TR' AND name = 'Dedeköy';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Demirtaş';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Demiryol';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Dereyanı';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Dicle';
DELETE FROM city WHERE state_code = '11' AND country_code = 'TR' AND name = 'Dodurga';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Doruklu';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Dorumali';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Doğanca';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Doğankavak';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Doğanköy';
DELETE FROM city WHERE state_code = '27' AND country_code = 'TR' AND name = 'Doğanpınar';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Dursunlu';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Duruca';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Düzova';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Ebish';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Eksere';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Elbeyli';
DELETE FROM city WHERE state_code = '33' AND country_code = 'TR' AND name = 'Elvanlı';
DELETE FROM city WHERE state_code = '34' AND country_code = 'TR' AND name = 'Eminönü';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Erköklü';
DELETE FROM city WHERE state_code = '29' AND country_code = 'TR' AND name = 'Evren';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Evrenseki';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Eymirli';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Eşme';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Gelinkaya';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Gerdzhyush';
DELETE FROM city WHERE state_code = '17' AND country_code = 'TR' AND name = 'Geyikli';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Girikbedro';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Gyundyukoru';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Göcek';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Gökbudak';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Gökçekoru';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Gökçen';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Gölgelikonak';
DELETE FROM city WHERE state_code = '50' AND country_code = 'TR' AND name = 'Göreme';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Göynük';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Gözpınar';
DELETE FROM city WHERE state_code = '78' AND country_code = 'TR' AND name = 'Gözyeri';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Güleçler';
DELETE FROM city WHERE state_code = '64' AND country_code = 'TR' AND name = 'Güllü';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Gülveren';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Gümüşgöze';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Güneren';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Günyazı';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Güvercinlik';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Haberli';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Hacıpaşa';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Halıdere';
DELETE FROM city WHERE state_code = '17' AND country_code = 'TR' AND name = 'Hamdibey';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Hamzabey';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Hilal';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Hisar';
DELETE FROM city WHERE state_code = '25' AND country_code = 'TR' AND name = 'Ilıca';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Işıklar';
DELETE FROM city WHERE state_code = '03' AND country_code = 'TR' AND name = 'Işıklar';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kabala';
DELETE FROM city WHERE state_code = '77' AND country_code = 'TR' AND name = 'Kadıköy';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Kalkan';
DELETE FROM city WHERE state_code = '17' AND country_code = 'TR' AND name = 'Kalkım';
DELETE FROM city WHERE state_code = '23' AND country_code = 'TR' AND name = 'Karakoçan / Elazığ';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Karalar';
DELETE FROM city WHERE state_code = '54' AND country_code = 'TR' AND name = 'Karasu Mahallesi';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Karasüleymanlı';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Kargı';
DELETE FROM city WHERE state_code = '30' AND country_code = 'TR' AND name = 'Karsani';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Karıncalı';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Kastal';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kavsan';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Kayabağlar';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kayalıpınar';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Kayapınar';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Kaymakçı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kaynakkaya';
DELETE FROM city WHERE state_code = '77' AND country_code = 'TR' AND name = 'Kaytazdere';
DELETE FROM city WHERE state_code = '06' AND country_code = 'TR' AND name = 'Kazan';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Kazancı';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Kefken';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Kerh';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kindirip';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Kirazlı';
DELETE FROM city WHERE state_code = '15' AND country_code = 'TR' AND name = 'Kocaaliler';
DELETE FROM city WHERE state_code = '77' AND country_code = 'TR' AND name = 'Kocadere';
DELETE FROM city WHERE state_code = '33' AND country_code = 'TR' AND name = 'Kocahasanlı';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Konaklı';
DELETE FROM city WHERE state_code = '65' AND country_code = 'TR' AND name = 'Konalga';
DELETE FROM city WHERE state_code = '77' AND country_code = 'TR' AND name = 'Koruköy';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Koyunluca';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Kullar';
DELETE FROM city WHERE state_code = '59' AND country_code = 'TR' AND name = 'Kumbağ';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Kumköy';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kumlu';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Kumçatı';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Kurşunlu';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kutlubey';
DELETE FROM city WHERE state_code = '42' AND country_code = 'TR' AND name = 'Kuyulusebil';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Kuzeytepe';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Köseköy';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Köseli';
DELETE FROM city WHERE state_code = '11' AND country_code = 'TR' AND name = 'Küplü';
DELETE FROM city WHERE state_code = '22' AND country_code = 'TR' AND name = 'Küplü';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Küçükkendirci';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Küçükkumla';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Kılavuz';
DELETE FROM city WHERE state_code = '77' AND country_code = 'TR' AND name = 'Kılıç';
DELETE FROM city WHERE state_code = '26' AND country_code = 'TR' AND name = 'Kırka';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Kızkalesi';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Kızılağaç';
DELETE FROM city WHERE state_code = '64' AND country_code = 'TR' AND name = 'Kızılcasöğüt';
DELETE FROM city WHERE state_code = '15' AND country_code = 'TR' AND name = 'Kızılkaya';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Kızılsu';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Kışlak';
DELETE FROM city WHERE state_code = '17' AND country_code = 'TR' AND name = 'Lâpseki İlçesi';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Mahmutlar';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Mahmutlar';
DELETE FROM city WHERE state_code = '59' AND country_code = 'TR' AND name = 'Marmaracık';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Mağaralı';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Meydankapı';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Mezraa';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Minare';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Muratlı';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Narlıca';
DELETE FROM city WHERE state_code = '62' AND country_code = 'TR' AND name = 'Nazimiye';
DELETE FROM city WHERE state_code = '20' AND country_code = 'TR' AND name = 'Nikfer';
DELETE FROM city WHERE state_code = '53' AND country_code = 'TR' AND name = 'Nurluca';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Okurcalar';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Ortabağ';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Ortaca';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Ortaköy';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Ortaköy';
DELETE FROM city WHERE state_code = '42' AND country_code = 'TR' AND name = 'Ovakavağı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Oyalı';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Oymataş';
DELETE FROM city WHERE state_code = '32' AND country_code = 'TR' AND name = 'Pavlu Cebel';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Payallar';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Pekmezli';
DELETE FROM city WHERE state_code = '52' AND country_code = 'TR' AND name = 'Piraziz İlçesi';
DELETE FROM city WHERE state_code = '62' AND country_code = 'TR' AND name = 'Pulumer';
DELETE FROM city WHERE state_code = '69' AND country_code = 'TR' AND name = 'Pulur';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Pınarbaşı';
DELETE FROM city WHERE state_code = '33' AND country_code = 'TR' AND name = 'Pınarbaşı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Pınardere';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Razvaliny Ayinvan';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Reshidi';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Salat';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Sarigerme';
DELETE FROM city WHERE state_code = '09' AND country_code = 'TR' AND name = 'Sarıkemer';
DELETE FROM city WHERE state_code = '27' AND country_code = 'TR' AND name = 'Sekili';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Seksenören';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Selah';
DELETE FROM city WHERE state_code = '64' AND country_code = 'TR' AND name = 'Selçikler';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Serhatta';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Seri';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Serinyol';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Serkan';
DELETE FROM city WHERE state_code = '26' AND country_code = 'TR' AND name = 'Sevinç';
DELETE FROM city WHERE state_code = '08' AND country_code = 'TR' AND name = 'Seyitler';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Side';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Sivrice';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Sulak';
DELETE FROM city WHERE state_code = '59' AND country_code = 'TR' AND name = 'Sultanköy';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Sölöz';
DELETE FROM city WHERE state_code = '46' AND country_code = 'TR' AND name = 'Süleymanlı';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Tacir';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Tahtaköprü';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Taliban';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Tatkavaklı';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Tavşancıl';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Tavşanlı';
DELETE FROM city WHERE state_code = '77' AND country_code = 'TR' AND name = 'Taşköprü';
DELETE FROM city WHERE state_code = '56' AND country_code = 'TR' AND name = 'Taşlı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Teffi';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Tekirova';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Telminar';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Tepealtı';
DELETE FROM city WHERE state_code = '09' AND country_code = 'TR' AND name = 'Tepecik';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Tepehan';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Tililan';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Toptepe';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Toygarlı';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Turgut';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Turgutreis';
DELETE FROM city WHERE state_code = '23' AND country_code = 'TR' AND name = 'Turluk';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Turunçova';
DELETE FROM city WHERE state_code = '07' AND country_code = 'TR' AND name = 'Türkler';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Ulaşlı';
DELETE FROM city WHERE state_code = '27' AND country_code = 'TR' AND name = 'Uluyatır';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Umurbey';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Uzunbağ';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Uzungeçit';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Uzunkavak';
DELETE FROM city WHERE state_code = '59' AND country_code = 'TR' AND name = 'Velimeşe';
DELETE FROM city WHERE state_code = '11' AND country_code = 'TR' AND name = 'Vezirhan';
DELETE FROM city WHERE state_code = '38' AND country_code = 'TR' AND name = 'Yahyali';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Yalakdere';
DELETE FROM city WHERE state_code = '42' AND country_code = 'TR' AND name = 'Yalıhüyük';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Yalıkavak';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Yaniklar';
DELETE FROM city WHERE state_code = '21' AND country_code = 'TR' AND name = 'Yaprakbaşı';
DELETE FROM city WHERE state_code = '42' AND country_code = 'TR' AND name = 'Yarma';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Yaylı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Yayvantepe';
DELETE FROM city WHERE state_code = '29' AND country_code = 'TR' AND name = 'Yağlıdere';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Yemişli';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Yenice';
DELETE FROM city WHERE state_code = '42' AND country_code = 'TR' AND name = 'Yeniceoba';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Yenifoça';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Yeniköy';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Yeniköy';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Yeniköy';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Yenipınar';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Yenişakran';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Yeşilalan';
DELETE FROM city WHERE state_code = '27' AND country_code = 'TR' AND name = 'Yeşildere';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Yolağzı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Yolbaşı';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Yukarı Taşyalak';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'Yuvacık';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Zeytindağ';
DELETE FROM city WHERE state_code = '45' AND country_code = 'TR' AND name = 'Zeytinliova';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Çakırca';
DELETE FROM city WHERE state_code = '16' AND country_code = 'TR' AND name = 'Çakırlı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Çalpınar';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Çalışkan';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Çandarlı';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Çardaklı';
DELETE FROM city WHERE state_code = '42' AND country_code = 'TR' AND name = 'Çatalhöyük';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Çavuşlu';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Çaylı';
DELETE FROM city WHERE state_code = '72' AND country_code = 'TR' AND name = 'Çevrimova';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Çınaraltı';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Çıplak';
DELETE FROM city WHERE state_code = '31' AND country_code = 'TR' AND name = 'Çırtıman';
DELETE FROM city WHERE state_code = '48' AND country_code = 'TR' AND name = 'Ölüdeniz';
DELETE FROM city WHERE state_code = '63' AND country_code = 'TR' AND name = 'Öncül';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Özbek';
DELETE FROM city WHERE state_code = '35' AND country_code = 'TR' AND name = 'Özdere';
DELETE FROM city WHERE state_code = '39' AND country_code = 'TR' AND name = 'Üsküp';
DELETE FROM city WHERE state_code = '41' AND country_code = 'TR' AND name = 'İhsaniye';
DELETE FROM city WHERE state_code = '27' AND country_code = 'TR' AND name = 'İkizce';
DELETE FROM city WHERE state_code = '64' AND country_code = 'TR' AND name = 'İlyaslı';
DELETE FROM city WHERE state_code = '70' AND country_code = 'TR' AND name = 'İnönü';
DELETE FROM city WHERE state_code = '09' AND country_code = 'TR' AND name = 'İsabeyli';
DELETE FROM city WHERE state_code = '66' AND country_code = 'TR' AND name = 'Şefaatli İlçesi';
DELETE FROM city WHERE state_code = '30' AND country_code = 'TR' AND name = 'Şemdinni İlçesi';
DELETE FROM city WHERE state_code = '73' AND country_code = 'TR' AND name = 'Şenoba';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Şenocak';
DELETE FROM city WHERE state_code = '47' AND country_code = 'TR' AND name = 'Şenyurt';

DELETE FROM city WHERE country_code = 'TR' AND state_code = '02' AND name = 'Adıyaman';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '03' AND name = 'Afyonkarahisar';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '05' AND name = 'Amasya';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '12' AND name = 'Bingöl';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '13' AND name = 'Bitlis';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '15' AND name = 'Burdur';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '17' AND name = 'Çanakkale';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '19' AND name = 'Çorum';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '23' AND name = 'Elazığ';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '28' AND name = 'Giresun';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '29' AND name = 'Gümüşhane';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '47' AND name = 'Mardin';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '49' AND name = 'Muş';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '50' AND name = 'Nevşehir';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '57' AND name = 'Sinop';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '58' AND name = 'Sivas';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '62' AND name = 'Tunceli';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '64' AND name = 'Uşak';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '68' AND name = 'Aksaray';
DELETE FROM city WHERE country_code = 'TR' AND state_code = '72' AND name = 'Batman';

UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '01' AND name = 'Adana';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '04' AND name = 'Ağrı';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '06' AND name = 'Ankara';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '07' AND name = 'Antalya';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '08' AND name = 'Artvin';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '09' AND name = 'Aydın';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '10' AND name = 'Balıkesir';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '11' AND name = 'Bilecik';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '14' AND name = 'Bolu';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '16' AND name = 'Bursa';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '20' AND name = 'Denizli';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '21' AND name = 'Diyarbakır';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '22' AND name = 'Edirne';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '24' AND name = 'Erzincan';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '25' AND name = 'Erzurum';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '26' AND name = 'Eskişehir';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '27' AND name = 'Gaziantep';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '30' AND name = 'Hakkâri';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '32' AND name = 'Isparta';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '33' AND name = 'Mersin';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '35' AND name = 'İzmir';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '36' AND name = 'Kars';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '37' AND name = 'Kastamonu';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '38' AND name = 'Kayseri';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '39' AND name = 'Kırklareli';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '40' AND name = 'Kırşehir';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '42' AND name = 'Konya';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '43' AND name = 'Kütahya';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '44' AND name = 'Malatya';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '45' AND name = 'Manisa';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '46' AND name = 'Kahramanmaraş';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '48' AND name = 'Muğla';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '51' AND name = 'Niğde';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '52' AND name = 'Ordu';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '53' AND name = 'Rize';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '55' AND name = 'Samsun';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '56' AND name = 'Siirt';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '59' AND name = 'Tekirdağ';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '60' AND name = 'Tokat';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '61' AND name = 'Trabzon';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '63' AND name = 'Şanlıurfa';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '65' AND name = 'Van';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '66' AND name = 'Yozgat';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '67' AND name = 'Zonguldak';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '69' AND name = 'Bayburt';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '70' AND name = 'Karaman';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '71' AND name = 'Kırıkkale';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '73' AND name = 'Şırnak';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '74' AND name = 'Bartın';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '75' AND name = 'Ardahan';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '76' AND name = 'Iğdır';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '77' AND name = 'Yalova';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '78' AND name = 'Karabük';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '79' AND name = 'Kilis';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '80' AND name = 'Osmaniye';
UPDATE city SET name = 'Merkez' WHERE country_code = 'TR' AND state_code = '81' AND name = 'Düzce';

INSERT INTO city(name,state_id,state_code,country_id,country_code,latitude,longitude,created_at,flag,wikiDataId) VALUES
('Karesi',2175,'10',225,'TR','39.64833300','27.88250000','2022-12-05 18:10:00',1,'Q16852358'),
('Derecik',2190,'70',225,'TR','37.07242300','44.32434800','2022-12-05 18:10:00',1,'Q1199986'),
('Çamlıhemşin',2219,'53',225,'TR','41.04593800','41.00527500','2022-12-05 18:10:00',1,'Q2670821'),
('Derepazarı',2219,'53',225,'TR','41.02472200','40.42555600','2022-12-05 18:10:00',1,'Q2670684'),
('Ayancık',4854,'57',225,'TR','41.95000000','34.58333300','2022-12-05 18:10:00',1,'Q792769'),
('Aralık',2166,'76',225,'TR','39.87277800','44.51916700','2022-12-05 18:10:00',1,'Q527626');
SQL;

        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221206_081748_turkey_state_city_refactoring cannot be reverted.\n";

        return true;
    }
}