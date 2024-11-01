<?php
/*
Plugin Name: Yunus Emre Dîvanı
Plugin URI: http://wordpress.org/extend/plugins/yunus-emre-divani/
Description: Yunus Emre'nin, aruz ölçüsüyle ve hece ölçüsüyle yazılmış şiirlerinden toplanmış dîvanından, seçme beyit ve dörtlükleri gösteren bir eklenti.
Version: 1.0
Author: Süleyman ÜSTÜN
Author URI: http://suleymanustun.com
*/

add_action("plugins_loaded", "yed_widget_create");

function yed_widget_create() {
	$options = array('classname' => 'yed_widget', 'description' => "Yunus Emre'nin, aruz ölçüsüyle ve hece ölçüsüyle yazılmış şiirlerinden toplanmış dîvanından, seçme beyit ve dörtlükleri gösteren bir bileşen." );
	wp_register_sidebar_widget('yed_widget', 'Yunus Emre Dîvanı', 'yed_widget_init', $options);
}

function yed_widget_init($args) {
	extract($args);
	echo $before_widget;
	echo $before_title.'Yunus Emre Dîvanı'.$after_title;
	yed_widget_show();
	echo $after_widget;
}

function yed_widget_show() {
	$divan = array(
		array('BEN YÜRÜREM YANE YANE'=>array(
			array('Ben yürürem yane yane, Aşk boyadi beni kane','Ne akilem ne Divane, Gel gör beni aşk neyledi'),
			array('Gah eserem yeller gibi, Gah tozaram yollar gibi','Gah akaram seller gibi, gel gör beni aşk neyledi'),
			array('Akan sulayın çağlaram, Dertli cigerem dağlaram','Şeyhim anuban ağlaram, gel gör beni aşk neyledi','Ya elim al kaldır beni, ya vaslına erdir beni'),
			array('Mecnun oluban yürürem, ol yari düşte görürem','Uyanıp melul oluram, gel gör beni aşk neyledi'),
			array('Miskin Yunus biçareyem, baştan aşağı yareyem','Dost ilinden avareyem, gel gör beni aşk neyledi')
			
		)),
		array('SEVELİM SEVİLELİM'=>array(
			array('Hak cihana doludur, kimseler Hakkı bilmez','Onu sen senden iste, o senden ayrı olmaz','Dünyaya gelen geçer, bir bir şerbetin içer','Bu bir köprüdür geçer, Cahiller onu bilmez'),
			array('Gelin tanış olalım, işin kolayın tutalım','Sevelim sevilelim, dünya kimseye kalmaz','Yunus sözün anlar isen, mani\'sini dinler isen','Sana iyi dirlik gerek, bunda kimseler kalmaz')
		)),
		array('GÖNÜLLER YAPMAYA GELDİM'=>array(
			array('Benim bunda kararım yok, bunda gitmeye geldim','Bezirganım mataım çok, alana satmağa geldim.','Ben gelmedim da\'vi için benim işim sevi için','Dostun evi gönüllerdir, gönüller yapmağa geldim'),
			array('Dost eşruğu deliliğim, aşıklar bilir neliğim','Devşuruben ikiliğim, birliğe bitmeye geldim','Yunus Emre aşık olmuş, ma\'şuka derdinden olmuş','Gerçek erin kapısında ömrüm harcamaya geldim')
		)),
		array('DİLSİZLER HABERİN'=>array(
			array('Dilsizler haberin kulaksız dinleyesi','Dilsiz kulaksız sözü, can gerek anlayaşı','Dinlemeden anladık, anlamadan eyledik','Gerçek erin bu yolda yokluktur sermayesi'),
			array('Biz sevdik aşık olduk, sevildik maşuk olduk','Her dem yeni dirlikte, bizden kim usanası','Miskin Yunus ol veli, yerde gökte dopdolu','Her taş altında gizli, bin imran oğlu MUSİ')
		)),
		array('AŞK KİTABIN OKURUZ'=>array(
			array('Söylememek harcısı, söylemeğin hasıdır','Söylemeğin harcısı, gönüllerin pasıdır','Cümle yaratılmışa bir göz ile bakmayan','Halka müderris ise, hakikatte asidir'),
			array('Şeriat haberini şerh ile eydem işit','Şeriat bir gemidir, hakikat deryasıdır','Ol geminin tahtası her nice muhkem ise','Deniz mevci kat olsa, tahta uşanasıdır'),
			array('Bundan içeri haber işit, eydeyin ey yar','Hakikatin kafiri, şer\'in evliyasıdır','Biz talib-i ilimleriz, aşk kitabın okuruz','Calap müderris bize, aşk hod medresedir')
		)),
		array('NİCE BİR BESLEYESİN'=>array(
			array('Nice bir besleyesin, bu kadd ile kameti','Düştün dünya zevkine unuttun kıyameti','Dürüs, kazan, ye yedir, bir gönül ele getir','Yüz KABEden yiğrektir, bir gönül ziyareti'),
			array('Uslu değil delidir Halka Salusluk satan','Nefsin müslüman etsin var ise kerameti','Yunus imdi sen dahi, gerçeklerden olagör','Gerçek erenler imiş, cümlenin ziyareti')
		)),
		array('BU BİR ACAİB HALDİR'=>array(
			array('Bu bir acaip haldir bu hale kimse ermez','Alimle davi kılar, Veli değme göz görmez','İlm ile hikmet ile, kimse ermez bu sırra','Bu bir acaib sırdır, ilme kitaba sığmaz'),
			array('Alem ilmi okuyan, dört mezhep sırrın duyan','Aciz kaldı bu yolda, bu aşka el uramaz','Yunus canını terk et, bildiklerini terk et','Fena olmayan suret, şahına vasıl olmaz')
		)),
		array('AŞK MAKAMI'=>array(
			array('Aşk makamı al\'ır, aşk kadim ezelidir','Aşk sözünü söyleyen, cümle kudret dilidir','Diyen o, işiten o, gösteren o','Her sözü söyleyen o, suret can menzilidir'),
			array('Suret söz kanda buldu, söz sahibi kaçan oldu','Surete kendi geldi, dil hikmetin yoludur','Bu bizim işretimiz, oldur bu lezzetimiz','İçip esridiğimiz, aşk şerbeti gölüdür','Yunus sözünde yalan, görmedi mumin olan','Ömrün zülmete salan, marifet yoksuludur')
		)),
		array('HAK BİR GÖNÜL VERDİ'=>array(
			array('Hak bir gönül verdi bana, ha demeden hayran olur','Bir dem gelir şadan olur, bir dem gelir giryan olur','Bir dem gelir söyleyemez, bir sözü şerh eyleyemez','Bir dem cehalette kalır, nesne bilmez nadan olur'),
			array('Bir dem dev olur ya peri, viraneler olur yeri','Bir dem uçar BELKIS ile sultan-ı ins u can olur','Bir dem varır mescitlere, yüz sürer anda yerlere','Bir dem varır deyre girer, incil okur ruhban olur'),
			array('Bir dem gelir İSA gibi ölmüşleri diri kılar','Bir dem girer kibr evine, Firavn ile Haman olur','Bir dem döner CEBRAİLE rahmet saçar her mahfile','Bir dem gelir gümrah olur, miskin Yunus hayran olur')
		)),
		array('AŞKIN ALDI BENDEN BENİ'=>array(
			array('Aşkın aldı benden beni, bana seni gerek seni','Ben yanarım dün ü günü, bana seni gerek seni','Ne varlığa sevinirim, ne yokluğa yerinirim','Aşkın ile avunurum bana seni gerek seni'),
			array('Aşkın aşıklar öldürür,Aşk denizine daldırır','Tecelli ile doldurur,bana seni gerek seni','Aşkın şarabından içem,Mecnun olup yola düşem','Sensin dün ü gün endişem, Bana seni gerek seni'),
			array('Sufilere sohbet gerek, Ahilere ahret gerek','Mecnunlara Leyla gerek, bana seni gerek seni','Eğer beni öldüreler, külüm göğe savuralar','Toprağım anda çağırır, bana seni gerek seni'),
			array('Cennet dedikleri ne ki, bir kaç köşkle birkaç huri','İsteyene ver onları, bana seni gerek seni','Yunus-durur benim adım, gün geçtikce artar ödüm','İki cihanda maksudum, bana seni gerek seni')
		)),
		array('BİR KEZ GÖNÜL YIKTIN İSE'=>array(
			array('Bir kez gönül yıktın ise','Bu kıldığın namaz değil','Yetmişiki millet dahi','Elin yüzün yumaz değil'),
			array('Yol odur ki, doğru vara','Göz odur ki, Hakkı göre','Er odur ki alçak dura','Yüceden bakan göz değil')
		)),
		array('İLİM İLİM BİLMEKTİR'=>array(
			array('İlim ilim bilmektir, ilim kendin bilmektir','Sen kendini bilmezsin, ya nice okumaktır','Okumaktan mani ne, kişi Hakkı bilmektir','Çün okudun bilemedin, ha bir kuru emektir'),
			array('Okudum bildim deme, çok taat kıldım deme','Eri hak bilmez isen, abes yere yelmektir','Dört kitabın manisi, bellidir bir elif te','Sen elif dersin hoca, manisi ne demektir'),
			array('Yunus der ki Ey hoca','Gerekse var bin Hacca','Hepisinden iyice','Bir gönüle girmektir')
		)),
		array('ACEP BU BENİM HALİM'=>array(
			array('Acep bu benim canım, azat ola mı ya Rab','Yoksa yedi Tamu\'da yana kala mı ya Rab'),
			array('Acep bu benim halim, yer altında ahvalim','Varıp yatacak yerim, akrep dola mı ya Rab'),
			array('Can hulkuma geldikte, Azrail\'i gördükte','Ya canımı aldıkta, asan ola mı ya Rab'),
			array('Dar oldu bana düzler, gice ile gündüzler','Dünyaya bakan gözler, didar göre mi ya Rab'),
			array('Allah olucak Kadı, bizden ola mı razı','Görüp Habib\'in bizi, şef\'i ola mı ya Rab'),
			array('Yunus kabre vardıkta, Münker Nekir geldikte','Bize sual ettikte, dilim döne mi ya Rab')
		)),
		array('ACEP N\'OLA BENİM HALİM'=>array(
			array('Bir korku düştü canıma, acep n\'ola benim halim','Derman olmaz ise bana, acep n\'ola benim halim'),
			array('Canım tenimden üzüle, gitmek yararı düzüle','Bu suret nakşı bozula, acep n\'ola benim halim'),
			array('Dünya donların soyucak, yuyucu tenim yuyucak','İletip kabre koyucak, acep n\'ola benim halim'),
			array('Eller gidip ben kalıcak, sinde yalnız olucak','Münkerle Nekir gelicek, acep n\'ola benim halim'),
			array('Ne ayak tuta, ne elim, ne aklım kala, ne bilim','Cevap vermez ise dilim, acep n\'ola benim halim'),
			array('Mezardan duru gelicek, hak terazi kurulacak','Amelimiz görülecek, acep n\'ola benim halim'),
			array('Miskin Yunus eydür sözü, kan yaş ile dolu gözü','Dergahına tutar yüzü, acep n\'ola benim halim')
		)),
		array('ALLAH'=>array(
			array('Aşkın odu ciğerimi, yaka geldi, yaka gider','Garip başım bu sevdayı, çeke geldi çeke gider'),
			array('Kar etti firak canıma, aşık oldum ol Sultana','Aşk zencirin dost boynuna, taka geldi, taka gider'),
			array('Sadıklar durur sözüne, gayrı görünmez gözüne','Bu gözlerim Dost yüzüne, baka geldi, baka gider'),
			array('Arada olmasın naşı, onulmaz bağrımın başı','Gözlerimin kanlı yaşı, aka geldi, aka gider'),
			array('Bülbül eder ah ü figan, hasretle yandı bu can','Benim gönülcüğüm ey can, çıka geldi, çıka gider'),
			array('Yunus söyler bu sözleri, efgan eder bülbülleri','Dost bağçesinde gülleri, koka geldi, koka gider')
		)),
		array('ALLAH SANA SUNDUM ELİM'=>array(
			array('Sensin kerim, sensin rahim, Allah sana sundum elim','Senden artık yoktur emin, Allah sana sundum elim'),
			array('Ecel geldi vade erdi, bu ömrüm kadehi doldu','Kimdir ki içmeden kaldı, Allah sana sundum elim'),
			array('Gözlerim göğe süzüldü, canım göğüsten üzüldü','Dilim tetiği bozuldu, Allah sana sundum elim'),
			array('Üş biçildi kefen donum, Hazret\'e yönelttim yönüm','Acep nice ola halim, Allah sana sundum elim'),
			array('Urdular suyum ılıdı, kavim kardeş cümle geldi','Esen kalsın kavim kardeş, Allah sana sundum elim'),
			array('Geldi salacam sarılır, dört yana sala verilir','El namazıma derilir, Allah sana sundum elim'),
			array('Salacamı getirdiler, makberime yetirdiler','Halka olup oturdular, Allah sana sundum elim'),
			array('Çün cenazeden şeştiler, üstüme toprak saçtılar','Hep koyubeni kaçtılar, Allah sana sundum elim'),
			array('Yedi Tamu, sekiz Uçmak, her birinin vardır yolu','Her bir yolda yüzbin çarşı, Allah sana sundum elim'),
			array('Geldi Münker ile Nekir, her birisi sordu bir dil','İlahi Sen cevap vergil, Allah sana sundum elim'),
			array('Görün acep oldu zaman, gönülden eyleniz figan','Ölür çün anadan doğan, Allah sana sundum elim'),
			array('Yunus tap uzat bu sözü, Allahına dutgıl yüzü','Didardan ayırma bizi, Allah sana sundum elim')
		)),
		array('ANDAN AYRI BUÇUK SAAT'=>array(
			array('Cümle alem terkin uram, ben Dost terkin urımazam','Andan ayrı buçuk saat, ben ansızın durumazam'),
			array('Andan ayrı dirliğim, dirlik değildir benim','Koyam ol dirgüre beni, bu ölü dirgürimezem'),
			array('Huri gelip eydür ise, gönlün bana vergil deyu','Dost\'tan artık kimseye, ben gönlümü verimezem'),
			array('Dost deyu geçti ömrüm, başarmadım Dost kulluğun','Koyam ol başara beni, ben hiç iş başarımazam'),
			array('Bir gezden ol oldum, dahi benden ümit yoktur bana','Ben ol isem pes ol kani, bu sırra erimezem'),
			array('Değmeler eydür Yunus\'a, katlan bu gün yarın deyu','Ceht edüben bu günümü, yarına irgürimezem')
		)),
		array('EY BENİ AYIPLAYAN'=>array(
			array('Ey beni ayıplayan, gel beni aşktan kurtar','Elinden gelmez ise, söyleme fasid haber','Hiç kimsene kendinden, halden hale gelmedi','Cümlemizin halini, maşuk eder mukarrer'),
			array('Aşıkların her hali, Maşuk katında biter','Sözün var ona söyle, benim elimde ne var','Her kim aşk kadehinden,içti ise bir cura','Ona ne yad ne biliş, ona nesrik ne humar'),
			array('Dost yüzünden nikabı, her kim giderdi ise','Hicap kalmadı ona, ayruk ne hayr u ne şer','Şeriat edebinden korkaram söylemeye','Yokise eydeyidim daha ayrıksı haber','Dost kılıçından Yunus ölürse gam değil','Dost göğünden uyanan, Maşuk burcundan doğar')
		)),
		array('HABER EYLEN AŞIKLARA'=>array(
			array('Haber eylen aşıklara, Aşka gönül veren benem','Aşk bahrisi oluban denizlere dalan benem','Gördüm göğün meleklerin, her biri bir işteymis','Hak Calabın zikrin eden İNCİL benem KURAN benem'),
			array('Gördüm diyen değil, gören','Bildim diyen değil, bilen','Bilen O\'dur, gösteren O\,','Aşka esir olan benem'),
			array('Deli oldum adım Yunus','Aşk oldu bana kılavuz','Hazrete değin yalınız','Yüz sürüyü varan benem')
		)),
		array('BU ZAMANDA MÜSLÜMANLAR'=>array(
			array('Müslümanlar zamane yatlı oldu','Helal yenmez, haram kıymetli oldu','Fakirler miskinlikten çekti elin','Gönüller yıkıben heybetli oldu'),
			array('Peygamber yerine geçen hocalar','Bu halkın başına zahmetli oldu','Yunus gel aşık isen tevbe eyle','Nasuh\'a tevbe ucu kutlu oldu')
		)),
		array('AŞIKLAR ÖLMEZ'=>array(
			array('Ya rab bu ne derttir derman bulunmaz','Benim garip gönlüm aşktan usanmaz','Aşık ki cana kaldı aşık olmaz','Canın terketmeyen, ma\'şukun bulmaz'),
			array('Aşk pazarıdır bu canlar satılır','Satarım canımı kimseler almaz','Aşık, bir kişidir, Bu dünya malın','Ahiret korkusun bir pula saymaz'),
			array('Bu dünya ol ahiretten içeri','Aşıkın yeri var kimseler bilmez','Yunus öldü diye sela verirler','Ölen hayvan imiş, AŞIKLAR ÖLMEZ')
		)),
		array('GÖNÜL CALABIN TAHTI'=>array(
			array('Miskinlikte buldular, kimde erlik var ise','Merdivenden ittiler, yüksekten bakar ise','Gönül yüksekte gezer, dem-be-dem yoldan azar','Dış yüzüne o sızar içinde ne var ise'),
			array('Ak sakallı pir hoca, bilemez hali nice','Emek vermesin hacca, bir gönül yıkar ise','Sağır işitmez sözü, gece sanar gündüzü','Kördür münkirin gözü, alem münevver ise'),
			array('Gönül Calabın tahtı, CALAP gönüle baktı','İki cihan bedbahtı, kim gönül yıkar ise','Sen sana ne sanırsan ayrugada onu san','Dört kitabın manası budur eğer var ise'),
			array('Bildik gelenler geçmiş, konanlar geri göçmüş','Aşk şarabından içmiş, kim mana duyar ise','Yunus yoldan azuban, yüksek yerde durmasın','Sinle sırat görmeye, sevdiği didar ise')
		)),
		array('KİME GÖNÜL VERİR İSEM'=>array(
			array('Kime gönül verir isem, benim ile yar olmadı','Halim bilip derdim sorup bana vefadar olmadı','Haktan meğer takdir idi, Aşık oldu gönlüm sana','Hiç kimseler bencileyin, aşka giriftar olmadı'),
			array('İbrahime Nemrud odunu, aşktır gülistan eden','Aşktan nazar ericeğiz, gülzar oldu nar olmadı','Aşkta kahırlar çok olur, Aşıklara gayret gerek','Yunus aşık oldun ise, aşıklarda ar olmadı')
		)),
		array('AŞK VER BANA'=>array(
			array('İlahi bir aşk ver bana, kandalığım bilmeyeyim','Yavı kılayım ben beni, isteyiben bulmayayım','Al gider benden benliği, doldur içime şenliği','Diriliğimde öldür beni, varıp orda ölmeyeyim'),
			array('Bülbül olup öteyim, dost bahçesinde yatayım','Gül oluben açılayım, ayruk dahi solmayayım','Aşkdır derdin dermanı, aşk yoluna koydum canı','Yunus Emre eydur bunu, bir dem aşksız olmayayım.')
		)),
		array('AŞK'=>array(
			array('İşitin ey yarenler, kıymetli nesnedir aşk','Sultanları kul eyler, hikmetli nesnedir aşk','Akilleri şaşırır deryalara düşürür','Kayaları söyletir, kuvvetli nesnedir aşk'),
			array('Aşksızlara verme öğüt, öğüdünden ala değil','Aşksız adem hayvan olur, hayvan öğüt bilir değil')
		)),
		array('SUFİYİM HALK İÇİNDE'=>array(
			array('Sufiyim halk içinde, tesbih elimden gitmez','Dilim marifet söyler gönlüm hiç kabul etmez','Söylerim marifeti, saluslanırım katı','Miskinliğe dönmeye gönlümden kibir gitmez'),
			array('Görenler elim öper, tac u hırkaya bakar','Söyle sanırlar beni, zerrece günah etmez','Dışımda ibadetim sohbetim hoş taatım','İç pazara gelince bin yıllık ayyar etmez'),
			array('Dışım derviş içim boş, dilim tatlı sözüm hoş','Amma ettiğim işi dinin değişen etmez','Yunus eksikliğini Allah\'ına arz eyle','Onun keremi çoktur sen ettiğin o etmez')
		)),
		array('DERVİŞLİK DEDİKLERİ'=>array(
			array('Dervişlik dedikleri hırka ile tac degil','Gönlün derviş eyleyen hırkaya muhtaç değil','Durmuş marifet söyler, erene Yunus Emrem','Yol eriyle yoldadır, yolsuza yoldaş değil')
		)),
		array('HİÇ BİR KİŞİ BİLMEZ BİZİ'=>array(
			array('Hiç bir kişi bilmez bizi, biz ne işin içindeyiz','Ne hırsımız baydır bizim, ne nefsimiz içindeyiz','Bir kimsenin devletine, ta\'nediben biz gülmeyiz','Ne munkiriz alimlere, ne tersanın Hacındayız','Yunus eydur hey sultanım, özge şahım vardır benim','Ko dünya altın gümüşün, ne bakır-u tacındayız')
		)),
		array('ERENLER YOLU'=>array(
			array('Canım erenler yolu inceden ince imiş','Süleymana yol kesen şol bir karınca imiş','Eydürler idi bana aşık avare olur,','Geldi başıma gördüm, ol söz yerince imiş'),
			array('Dört kitabın manisin okudum hasıl ettim','Aşka gelicek gördüm, bir uzun hece imiş','İki kişi söyleşir Yunus\'u görsem diye','Biri eydur ben gördüm bir AŞIK koca imiş')
		)),
		array('AB-I HAYAT'=>array(
			array('Ab-I hayatın çeşmesi aşıkların visalidir','Sohbeti aşk ile eder, susamışları yakmaya','Aşk mı derim ben ona Tanrının uçmağın seve','Uçmak hod bir tuzaktır eblehler canın tutmağa'),
			array('Aşık olan miskin olur','Hak yoluna teslim olur','Her ne dersen boyun tutar','Çare yok gönül yıkmaya')
		)),
		array('İŞİTİN EY YARENLER'=>array(
			array('İşitin ey yarenler','Aşk bir güneşe benzer','Aşk olmayan gönül','Misal-i taşa benzer'),
			array('Taş gönülde ne biter','Dilinde agu tüter','Nice yumusak söylese','Sözü savaşa benzer'),
			array('Geç Yunus endişeden','Gerekse bu bişeden','Ere aşk gerek evvel','Ondan dervişe benzer')
		)),
		array('SENSİN KERİM'=>array(
			array('Sensin kerim sensin rahim, Allah sana sundum elim','Senden artuk yoktur emim, Allah sana sundum elim','Ecel geldi vade erdi, Bu ömrüm kadehi doldu','Kimdir ki içmeden kaldı, Allah sana sundum elim'),
			array('Gözlerim göğe süzüldü, canım göğüsten üzüldü','Dilim tetiği bozuldu, Allah sana sundum elim','Geldim salacam sarılır, Dört yana sela verilir','El namazıma derilir, Allah sana sundum elim'),
			array('Cun cenazeden şeştiler, üstüme toprak saçtılar','Hep koyubeni kaçtılar, Allah sana sundum elim','Yunus tap uzattın sözü, Allah\'ına tutgil yüzü','Didardan ayırma bizi, Allah sana sundum elim')
		)),
		array('ÇAĞIRAYIM MEVLAM SENİ'=>array(
			array('Dağlar ile taşlar ile çağırayım mevlam seni','Seherlerde kuşlar ile çağırayım mevlam seni','Sular dibinde mahi ile, sahralarda ahu ile','Abdal olup ya hu diye çağırayım mevlam seni'),
			array('Gökyüzünde İSA ile Tur dağında MUSA ile','Elindeki asa ile çağırayım mevlam seni','Derdi okus EYYÜP ile, gözü yaşlı YAKUP ile','Ol MUHAMMED mahbub ile çağırayım mevlam seni'),
			array('Hamd u şükrullah ile, vasf-ı kulhuvallah ile','Daim zikrullah ile çağırayım mevlam seni','Yunus okur diller ile, ol kumru bülbüller ile','Hakkı seven kullar ile çağırayım mevlam seni')
		)),
		array('DERTLİ DOLAP'=>array(
			array('Dolap niçin inilersin, Derdim vardır inilerim','Ben Mevlaya Aşık oldum, Onun için inilerim','Benim adım dertli dolap, suyum akar yalap yalap','Böyle emreyledi CALAP, Derdim vardır inilerim'),
			array('Beni bir dağda buldular, Kolum kanadım kırdılar','Dolaba layık gördüler, derdim vardır inilerim','Ben bir dağın ağacıyım, Ne tatlıyım ne Acıyım','Ben Mevlaya duacıyım, Derdim vardır inilerim'),
			array('Şol dülgerler beni yondu, her azam yerine kondu','Bu iniltim Haktan geldi, Derdim vardır inilerim','Yunus burda gelen gülmez, Kişi muradına ermez','Bu fanide kimse kalmaz, Derdim vardır inilerim.')
		)),
		array('LA ŞERİKE OKURSUN'=>array(
			array('La şerike okursun, sonra şerik katarsın','Bire iki demegil, fitne kimden tutarsın','Cun KURAN gökten indi, Onu Allah buyurdu','Ondan haber ver bana, ha kitaptan ötersin'),
			array('İlim okumaktan gerek kendözünü bilmektir','Kendözünü bilmezsen bir hayvandan betersin','Kılarsın riya namaz, günahın çok hayrın az','Dinle neye varır söz, Cehennemde bitersin'),
			array('Halka fetva verirsin, Ne için sen tutmazsın','İhlas ile gelirsen bizden nesne utarsın','Sen fakihsin ben fakir, sana hiç tan\'umuz yok','İlmin var amelin yok, günahlara batarsın')
		)),
		array('CANIM KURBAN OLSUN'=>array(
			array('Canım kurban olsun senin yoluna','Adı güzel kendi güzel Muhammed','Şefaat eyle bu kemter kuluna','Adı güzel kendi güzel Muhammed'),
			array('Mu\'min olanların çoktur cefası','Ahirette olur zevk u sefası','Onsekiz bir alemin Mustafa\'sı','Adı güzel kendi güzel Muhammed'),
			array('Yedi gökleri seyran eyleyen','Kürsi\'nin üstünde cevlan eyleyen','Mi\'racda ümmetini dileyen','Adı güzel kendi güzel Muhammed'),
			array('Dört caryar anun gökçek yaridur','Anı seven günahlardan beridur','On sekiz bin alemin sultanıdur','Adı güzel kendi güzel Muhammed'),
			array('Aşık Yunus nider dünyayı sensiz','Sen hak Peygambersin şeksiz şüphesiz','Sana uymayanlar gider imansız','Adı güzel kendi güzel Muhammed')
		)),
		array('CANLAR CANINI BULDUM'=>array(
			array('Canlar canını buldum bu canım yağma olsun','Assı ziyandan geçtim dükkanım yağma olsun','Ben benliğimden geçtim gözüm hicabın açtım','Dost vaslına eriştim gumanım yağma olsun'),
			array('Benden benliğim gitti hep mülkümü dost yuttu','La-mekana kavm oldum mekanım yağma olsun','Taalluktan üzüştüm ol dosttan yana uçtum','Aşk divanına düştüm divanım yağma olsun'),
			array('İkilikten usandım birlik hanına kandım','Derd-i şarabın içtim dermanım yağma olsun','Varlık cun sefer kıldı dost andan bize geldi','Viran gönül nur doldu cihanım yağma olsun'),
			array('Geçtim bitmez sağınçtan usandim yaz u kıştan','Bostanlar başın buldum bostanım yağma olsun','Yunus ne hoş demişsin bal u şeker yemişsin','Ballar balını buldum kovanım yağma olsun')
		)),
		array(''=>array(
			array('Dervişlik der ki bana sen derviş olamazsın','Gel ne diyeyim sana sen derviş olamazsın','Derviş bağrı taş gerek gözü dolu yaş gerek','Koyundan yavaş gerek sen derviş olamazsın'),
			array('Döğene elsiz gerek söğene dilsiz gerek','Derviş gönülsüz gerek sen derviş olamazsın','Dilin ile şakırsın çok maniler dokursun','Vara yoğa kakırsın sen derviş olamazsın'),
			array('Kakımak varmışsa ger Muhammed de kakırdı','Bu kakımak sende var sen derviş olamazsın','Doğruya varmayınca Murşide ermeyince','Hak nasib etmeyince sen derviş olamazsın'),
			array('Derviş Yunus gel imdi ummanlara dal imdi','Ummana dalmayınca sen derviş olamazsın')
		))
	);
	
	foreach ($divan[array_rand($divan)] as $siir) {
		foreach ($siir[array_rand($siir)] as $beyit) {
			echo '<li>'.$beyit.'</li>';
		}
	}
}
?>