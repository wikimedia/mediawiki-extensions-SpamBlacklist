<?php
/**
 * Internationalisation file for SpamBlacklist extension.
 *
 * @addtogroup Extensions
 */

$messages = array(

'en' => array(
	'spam-blacklist' => '
 # External URLs matching this list will be blocked when added to a page.
 # This list affects only this wiki; refer also to the global blacklist.
 # For documentation see http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- leave this line exactly as it is --> <pre>
#
# Syntax is as follows:
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-whitelist' => '
 #<!-- leave this line exactly as it is --> <pre>
# External URLs matching this list will *not* be blocked even if they would
# have been blocked by blacklist entries.
#
# Syntax is as follows:
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-invalid-lines' =>
	"The following spam blacklist {{PLURAL:$1|line is an|lines are}} " .
	" invalid regular {{PLURAL:$1|expression|expressions}} " .
	" and {{PLURAL:$1|needs|need}} to be corrected before saving the page:\n",
),

'ar' => array(
'spam-blacklist' => ' # الوصلات الخارجية التي تطابق هذه القائمة سيتم منعها عند إضافتها لصفحة.
 # هذه القائمة تؤثر فقط على هذه الويكي؛ ارجع أيضا للقائمة السوداء العامة.
 # للوثائق انظر http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- leave this line exactly as it is --> <pre>
#
# الصيغة كالتالي:
#   * كل شيء من علامة "#" إلى آخر السطر هو تعليق
#   * كل سطر غير فارغ هو تعبير منتظم يوافق فقط المضيفين داخل الوصلات الخارجية

 #</pre> <!-- leave this line exactly as it is -->',
'spam-whitelist' => ' #<!-- leave this line exactly as it is --> <pre>
# الوصلات الخارجية التي تطابق هذه القائمة *لن* يتم منعها حتى لو
# كانت ممنوعة بواسطة مدخلات القائمة السوداء.
#
# الصيغة كالتالي:
#   * كل شيء من علامة "#" إلى آخر السطر هو تعليق
#   * كل سطر غير فارغ هو تعبير منتظم يطابق فقط المضيفين داخل الوصلات الخارجية

 #</pre> <!-- leave this line exactly as it is -->',
'spam-invalid-lines' => '{{PLURAL:$1|السطر التالي|السطور التالية}}  في قائمة السبام السوداء هي {{PLURAL:$1|تعبير منتظم غير صحيح|تعبيرات منتظمة غير صحيحة}}  و {{PLURAL:$1|يحتاج|تحتاج}} أن يتم تصحيحها قبل حفظ الصفحة:',
),

/** Czech (Česky)
 * @author Li-sung
 */
'cs' => array(
	'spam-invalid-lines' => 'Na černé listině spamu {{PLURAL:$1|je následující řádka neplatný regulární výraz|jsou následující řádky neplatné regulární výrazy|jsou následující řádky regulární výrazy}} a je nutné {{PLURAL:$1|ji|je|je}} před uložením stránky opravit :',
),

'de' => array(
	'spam-blacklist' => '
 # Externe URLs, die in dieser Liste enthalten sind, blockieren das Speichern der Seite.
 # Diese Liste betrifft nur dieses Wiki; siehe auch die globale Blacklist.
 # Zur Dokumenation siehe http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- Diese Zeile darf nicht verändert werden! --> <pre>
#
# Syntax:
#   * Alles ab dem "#"-Zeichen bis zum Ende der Zeile ist ein Kommentar
#   * Jede nicht-leere Zeile ist ein regulärer Ausdruck, der gegen die Host-Namen in den URLs geprüft wird.

 #</pre> <!-- Diese Zeile darf nicht verändert werden! -->',

	'spam-whitelist' => '
 #<!-- Diese Zeile darf nicht verändert werden! --> <pre>
# Externe URLs, die in dieser Liste enthalten sind, blockieren das Speichern der Seite nicht, auch wenn sie
# in der globalen oder lokalen schwarzen Liste enthalten sind.
#
# Syntax:
#   * Alles ab dem "#"-Zeichen bis zum Ende der Zeile ist ein Kommentar
#   * Jede nicht-leere Zeile ist ein regulärer Ausdruck, der gegen die Host-Namen in den URLs geprüft wird.

 #</pre> <!-- Diese Zeile darf nicht verändert werden! -->',

	'spam-invalid-lines' =>
	"{{PLURAL:$1
	| Die folgende Zeile in der Spam-Blacklist ist ein ungültiger regulärer Ausdruck. Sie muss vor dem Speichern der Seite korrigiert werden
	| Die folgenden Zeilen in der Spam-Blacklist sind ungültige reguläre Ausdrücke. Sie müssen vor dem Speichern der Seite korrigiert werden}}:\n",
),

# فارسی (Huji)
'fa' => array(
	'spam-blacklist'     => '  # از درج پیوندهای بیرونی که با این فهرست مطابقت کنند جلوگیری می‌شود.
  # این فهرست فقط روی همین ویکی اثر دارد؛ به فهرست سیاه سراسری نیز مراجعه کنید.
  # برای مستندات به http://www.mediawiki.org/wiki/Extension:SpamBlacklist مراجعه کنید
  #<!-- این سطر را همان‌گونه که هست رها کنید --> <pre>
# دستورات به این شکل هستند:
#  * همه چیز از «#» تا پایان سطر به عنوان توضیح در نظر گرفته می‌شود
#  * هر سطر از متن به عنوان یک دستور regex در نظر گرفته می‌شود که فقط  با نام میزبان در نشانی اینترنتی مطابقت داده می‌شود

  #</pre> <!-- این سطر را همان‌گونه که هست رها کنید -->',
	'spam-whitelist'     => '  #<!-- این سطر را همان‌گونه که هست رها کنید --> <pre>
# از درج پیوندهای بیرونی که با این فهرست مطابقت کنند جلوگیری نمی‌شود حتی اگر
# در فهرست سیاه قرار داشته باشند.
#
# دستورات به این شکل هستند:
#  * همه چیز از «#» تا پایان سطر به عنوان توضیح در نظر گرفته می‌شود
#  * هر سطر از متن به عنوان یک دستور regex در نظر گرفته می‌شود که فقط  با نام میزبان در نشانی اینترنتی مطابقت داده می‌شود

  #</pre> <!-- این سطر را همان‌گونه که هست رها کنید -->',
	'spam-invalid-lines' => '{{PLURAL:$1|سطر|سطرهای}} زیر در فهرست سیاه هرزنگاری دستورات regular expression غیرمجازی {{PLURAL:$1|است|هستند}} و قبل از ذخیره کردن صفحه باید اصلاح {{PLURAL:$1|شود|شوند}}:',

),

'fr' => array(
	'spam-blacklist'     => ' # Les liens externes faisant partie de cette liste seront bloqués lors de leur insertion dans une page.
 # Cette liste ne concerne que Wikinews ; référez vous aussi à la liste noire générale de Méta.
 # La documentation se trouve à l’adresse suivante : http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 # <!--Laissez cette ligne telle quelle --> <pre>
#
# La syntaxe est la suivante
#   * Tout texte qui suit le « # » est considéré comme un commentaire.
#   * Toute ligne non vide est un fragment regex qui ne concerne que les liens hypertextes.
 #</pre> <!--Laissez cette ligne telle quelle -->',
	'spam-whitelist'     => ' #<!-- Laissez cette ligne telle quelle--> <pre>
# Les liens externes faisant partie de cette liste ne seront pas bloqués même
# si elles ont été bloquées en vertu d’une liste noire.
#
# La syntaxe est la suivante
#   * Tout texte qui suit le « # » est considéré comme un commentaire.
#   * Toute ligne non vide est un fragment regex qui ne concerne que les liens hypertextes.
 #</pre> <!--Laissez cette ligne telle quelle -->',
	'spam-invalid-lines' => '{{PLURAL:$1|La ligne suivante |Les lignes suivantes}} de la liste des spams {{PLURAL:$1|est rédigée|sont rédigées}} de manière incorrecte et {{PLURAL:$1|nécessite|nécessitent}} les corrections nécessaires avant toute sauvegarde de la page :',
),

'gl' => array(
	'spam-blacklist' => ' # As ligazóns externas que coincidan con esta listaxe serán bloqueadas cando se engadan a unha páxina.
 # Esta listaxe afecta unicamente a este wiki; consulte tamén a lista negra global.
 # Para documentación vexa http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- deixe esta liña exactamente como está --> <pre>
#
# A sintaxe é a que segue:
#   * Todo, desde o carácter "#" até o final da liña é un comentario
#   * Toda liña que non estea en branco é un fragmento de expresión regular que só coincide con hosts dentro de URLs

 #</pre> <!-- deixe esta liña exactamente como está -->',
	'spam-whitelist' => ' #<!-- deixe esta liña exactamente como está --> <pre>
 # As ligazóns externas que coincidan con esta listaxe *non* serán bloqueadas mesmo se
 # foren bloqueadas mediante entradas na lista negra.
#
# A sintaxe é a que segue:
#   * Todo, desde o carácter "#" até o final da liña é un comentario
#   * Toda liña que non estea en branco é un fragmento de expresión regular que só coincide con hosts dentro de URLs

 #</pre> <!-- deixe esta liña exactamente como está -->',
	'spam-invalid-lines' => '{{PLURAL:$1|A liña seguinte da lista negra de spam é|As liñas seguintes da lista negra de spam son}} {{PLURAL:$1|unha expresión regular|expresións regulares}} e {{PLURAL:$1|haina|hainas}} que corrixir antes de gardar a páxina:',
),

'hr' => array(
	'spam-blacklist' => ' # Vanjske URLovi koji budu pronađeni pomoću ovog popisa nije moguće snimiti na stranicu wikija.
 # Ovaj popis utiče samo na ovaj wiki; provjerite globalnu "crnu listu".
 # Za dokumentaciju pogledajte http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- leave this line exactly as it is --> <pre>
#
# Rabi se slijedeća sintaksa:
#   * Sve poslije "#" znaka do kraja linije je komentar
#   * svaki neprazni redak je dio regularnog izraza (\'\'regex fragment\'\') koji odgovara imenu poslužitelja u URL-u

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-whitelist' => ' #<!-- leave this line exactly as it is --> <pre>
# Vanjski URLovi koji budu pronađeni pomoću ovog popisa nisu blokirani
# čak iako se nalaze na "crnom popisu".
#
# Rabi se slijedeća sintaksa:
#   * Sve poslije "#" znaka do kraja linije je komentar
#   * svaki neprazni redak je dio regularnog izraza (\'\'regex fragment\'\') koji odgovara imenu poslužitelja u URL-u

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-invalid-lines' => '{{PLURAL:$1|Slijedeći redak|Slijedeći redovi|Slijedeći redovi}} "crnog popisa" spama {{PLURAL:$1|je|su}} nevaljani {{PLURAL:$1|regularan izraz|regularni izrazi|regularni izrazi}} i {{PLURAL:$1|mora|moraju|moraju}} biti ispravljeni prije snimanja ove stranice:',
),

'hsb' => array(
	'spam-blacklist' => ' # Eksterne URL, kotrež su w lisćinje wobsahowane, blokuja składowanje strony.
 # Tuta lisćina nastupa jenož tutón Wiki; hlej tež globalnu čornu lisćinu.
 # Za dokumentaciju hlej http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- Tuta linka njesmě so změnić! --> <pre>
#
# Syntaksa:
#   * Wšitko wot znamjenja "#" hač ke kóncej linki je komentar
#   * Kóžda njeprózdna linka je regularny wuraz, kotryž so přećiwo mjenu hosta w URL pruwuje.

 #</pre> <!-- Tuta linka njesmě so změnić! -->',
	'spam-whitelist' => ' #<!-- Tuta linka njesmě so změnić! --> <pre>
# Eksterne URL, kotrež su w tutej lisćinje wobsahowane, njeblokuja składowanje strony, byrnjež
# w globalnej abo lokalnej čornej lisćinje wobsahowane byli.
#
# Syntaksa:
#   * Wšitko wot znamjenja "#" hač ke kóncej linki je komentar
#   * Kóžda njeprózdna linka je regularny wuraz, kotryž so přećiwo mjenu hosta w URL pruwuje.

 #</pre> <!-- Tuta linka njesmě so změnić! -->',
'spam-invalid-lines' => '{{PLURAL:$1|slědowaca linka je njepłaćiwy regularny wuraz|slědowacych linkow je regularny wuraz|slědowace linki su regularne wurazy|slědowacej lince stej regularnej wurazaj}} a {{PLURAL:$1|dyrbi|dyrbi|dyrbja|dyrbjetej}} so korigować, prjedy hač so strona składuje:',
),

/** Hungarian (Magyar)
 * @author Bdanee
 */
'hu' => array(
	'spam-blacklist'     => '  # A lista elemeire illeszkedő külső hivatkozások blokkolva lesznek
  # A lista csak erre a wikire vonatkozik; a globális feketelistába is tedd bele.
  # Dokumentációhoz lásd a http://www.mediawiki.org/wiki/Extension:SpamBlacklist oldalt (angolul)
  #<!-- ezen a soron ne változtass --> <pre>
#
# A szintaktika a következő:
#  * Minden a „#” karaktertől a sor végéig megjegyzésnek számít
#  * Minden nem üres sor egy reguláris kifejezés darabja, amely csak az URL-ekben található kiszolgálókra illeszkedik',
	'spam-whitelist'     => '  #<!-- ezen a soron ne változtass --> <pre>
# A lista elemeire illeszkedő külső hivatkozások *nem* lesznek blokkolva, még
# akkor sem, ha illeszkedik egy feketelistás elemre.
#
# A szintaktika a következő:
#  * Minden a „#” karaktertől a sor végéig megjegyzésnek számít
#  * Minden nem üres sor egy reguláris kifejezés darabja, amely csak az URL-ekben található kiszolgálókra illeszkedik

  #</pre> <!-- ezen a soron ne változtass -->',
	'spam-invalid-lines' => 'Az alábbi {{PLURAL:$1|sor hibás|sorok hibásak}} a spam elleni feketelistájában; {{PLURAL:$1|javítsd|javítsd őket}} mentés előtt:',
),

/** Italian (Italiano)
 * @author BrokenArrow
 */
'it' => array(
	'spam-blacklist'     => '  # Le URL esterne al sito che corrispondono alla lista seguente verranno bloccate.
  # La lista è valida solo per questo sito; fare riferimento anche alla blacklist globale.
  # Per la documentazione si veda http://www.mediawiki.org/wiki/Extension:SpamBlacklist
  #<!-- non modificare in alcun modo questa riga --> <pre>  
# La sintassi è la seguente:  
#  * Tutto ciò che segue un carattere "#" è un commento, fino al termine della riga
#  * Tutte le righe non vuote sono frammenti di espressioni regolari che si applicano al solo nome dell\'host nelle URL
  #</pre> <!-- non modificare in alcun modo questa riga -->',
	'spam-whitelist'     => '  #<!-- non modificare in alcun modo questa riga --> <pre>  
# Le URL esterne al sito che corrispondono alla lista seguente *non* verranno
# bloccate, anche nel caso corrispondano a delle voci della blacklist
#
# La sintassi è la seguente:  
#  * Tutto ciò che segue un carattere "#" è un commento, fino al termine della riga
#  * Tutte le righe non vuote sono frammenti di espressioni regolari che si applicano al solo nome dell\'host nelle URL

  #</pre> <!-- non modificare in alcun modo questa riga -->',
	'spam-invalid-lines' => "{{PLURAL:$1|La seguente riga|Le seguenti righe}} della blacklist dello spam {{PLURAL:$1|non è un'espressione regolare valida|non sono espressioni regolari valide}}; si prega di correggere {{PLURAL:$1|l'errore|gli errori}} prima di salvare la pagina.",
),

/** Dutch (Nederlands)
 * @author SPQRobin
 */
'nl' => array(
	'spam-blacklist'     => ' # Externe URL\'s die voldoen aan deze lijst worden geweigerd bij het
 # toevoegen aan een pagina. Deze lijst heeft alleen invloed op deze wiki.
 # Er bestaat ook een globale zwarte lijst.
 # Documentatie: http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- laat deze lijn zoals hij is --> <pre>
#
# De syntax is als volgt:
#   * Alles vanaf het karakter "#" tot het einde van de regel is opmerking
#   * Iedere niet-lege regel is een fragment van een reguliere uitdrukking die
#     alleen van toepassing is op hosts binnen URL\'s.

 #</pre> <!-- laat deze lijn zoals hij is -->',
	'spam-whitelist'     => ' #<!-- laat deze lijn zoals hij is --> <pre>
# Externe URL\'s die voldoen aan deze lijst, worden *nooit* geweigerd, al
# zouden ze geblokkeerd moeten worden door regels uit de zwarte lijst.
#
# De syntaxis is als volgt:
#   * Alles vanaf het karakter "#" tot het einde van de regel is opmerking
#   * Iedere niet-lege regel is een fragment van een reguliere uitdrukking die
#     alleen van toepassing is op hosts binnen URL\'s.

 #</pre> <!-- laat deze lijn zoals hij is -->',
	'spam-invalid-lines' => 'De volgende {{PLURAL:$1|regel|regels}} van de zwarte lijst {{PLURAL:$1|is een|zijn}} onjuiste reguliere {{PLURAL:$1|uitdrukking|uitdrukkingen}}  en {{PLURAL:$1|moet|moeten}} verbeterd worden alvorens de pagina kan worden opgeslagen:',
),

'oc' => array(
	'spam-blacklist' => '# Los ligams extèrnes que fan partida d\'aquesta lista seràn blocats al moment de lor insercion dins una pagina. # Aquesta lista concernís pas que Wikinews ; referissetz-vos tanben a la lista negra generala de Meta. # La documentacion se tròba a l’adreça seguenta : http://www.mediawiki.org/wiki/Extension:SpamBlacklist # <!--Daissatz aquesta linha tala coma es --> <pre> # # La sintaxi es la seguenta # * Tot tèxt que seguís lo « # » es considerat coma un comentari. # * Tota linha pas voida es un fragment regex que concernís pas que los ligams ipertèxtes. #</pre> <!--Daissatz aquesta linha tala coma es -->',
	'spam-whitelist' => '# Los ligams extèrnes que fan partida d\'aquesta lista seràn blocas al moment de lor insercion dins una pagina. # Aquesta lista concernís pas que Wikinews ; referissetz-vos tanben a la lista negra generala de Meta. # La documentacion se tròba a l’adreça seguenta : http://www.mediawiki.org/wiki/Extension:SpamBlacklist # <!--Daissatz aquesta linha tala coma es --> <pre> # # La sintaxi es la seguenta # * Tot tèxt que seguís lo « # » es considerat coma un comentari. # * Tota linha pas voida es un fragment regex que concernís pas que los ligams ipertèxtes. #</pre> <!--Daissatz aquesta linha tala coma es -->',
	'spam-invalid-lines' => '{{PLURAL:$1|La linha seguenta |Las linhas seguentas}} de la lista dels spams {{PLURAL:$1|es redigida|son redigidas}} de biais incorrècte e {{PLURAL:$1|necessita|necessitan}} las correccions necessàrias abans tota salvagarda de la pagina :',
),

'pl' => array(
	'spam-blacklist' => ' # Linki zewnętrzne pasujące do tej listy będą blokowane przed dodawaniem do stron.
 # Ta lista dotyczy tylko tej wiki; istnieje też globalna czarna lista.
 # Dokumentacja tej funkcji znajduje się na stronie http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- zostaw tę linię dokładnie tak, jak jest --> <pre>
#
# Składnia jest następująca:
#   * Wszystko od znaku "#" do końca linii jest komentarzem
#   * Każda niepusta linia jest fragmentem wyrażenia regularnego, które będzie dopasowywane jedynie do hostów wewnątrz linków

 #</pre> <!-- zostaw tę linię dokładnie tak, jak jest -->',
	'spam-whitelist' => ' #<!-- zostaw tę linię dokładnie tak, jak jest --> <pre>
# Linki zewnętrzne pasujące do tej listy *nie będą* blokowane nawet jeśli
# zostałyby zablokowane przez czarną listę.
#
# Składnia jest następująca:
#   * Wszystko od znaku "#" do końca linii jest komentarzem
#   * Każda niepusta linia jest fragmentem wyrażenia regularnego, które będzie dopasowywane jedynie do hostów wewnątrz linków

 #</pre> <!-- zostaw tę linię dokładnie tak, jak jest -->',
	'spam-invalid-lines' => '{{PLURAL:$1|Następująca linia jest niepoprawnym wyrażeniem regularnym i musi być poprawiona przed zapisaniem strony:|Następujące linie są niepoprawnymi wyrażeniami regularnymi i muszą być poprawione przed zapisaniem strony:}}',
),

'pms' => array(
	'spam-blacklist' => '# J\'adrësse esterne ch\'as treuva ant sta lista-sì a vniran blocà se cheidun a jë gionta ansima a na pàgina. # Sta lista a l\'ha valor mach an sta wiki-sì; ch\'a-j fasa arferiment ëdcò a la lista nèira global. # Për dla documentassion ch\'a varda http://www.mediawiki.org/wiki/Extension:SpamBlacklist #<!-- ch\'a lassa sta riga-sì giusta \'me ch\'a l\'é --> <pre> # # La sintassi a l\'é: # * Tut lòn ch\'as anandia con na "#" fin a la fin dla riga as ten coma coment # * Qualsëssìa riga nen veuja a resta un tòch d\'espression regolar ch\'as paragon-a a ij nòm ëd servent andrinta a j\'adrësse #</pre> <!-- ch\'a lassa sta riga-sì giusta \'me ch\'a l\'é -->',
	'spam-whitelist' => '#<!-- ch\'a lassa sta riga-sì giusta \'me ch\'a l\'é --> <pre> # J\'adrësse esterne coma cole dë sta lista a vniran NEN blocà, ëdcò fin-a # s\'a fusso da bloché conforma a le régole dla lista nèira. # # La sintassi a l\'é: # * Tut lòn ch\'as anandia con na "#" fin a la fin dla riga as ten coma coment # * Qualsëssìa riga nen veuja a resta un tòch d\'espression regolar ch\'as paragon-a a ij nòm ëd servent andrinta a j\'adrësse #</pre> <!-- ch\'a lassa sta riga-sì giusta \'me ch\'a l\'é -->',
	'spam-invalid-lines' => '{{PLURAL:$1|St\'|Sti}} element dla lista nèira dla rumenta ëd reclam a {{PLURAL:$1|l\'é|son}} {{PLURAL:$1|n\'|dj\'}}espression regolar nen {{PLURAL:$1|bon-a|bon-e}} e a l\'{{PLURAL:$1|ha|han}} da manca d\'esse coregiùe anans che salvé la pàgina:',
),

/** Portuguese (Português)
 * @author 555
 */
'pt' => array(
	'spam-blacklist'     => '  # URLs externas que coincidam com esta lista serão bloqueadas quando
  # quando alguém as tentar adicionar em alguma página.
  # Esta lista refere-se apenas a este wiki. Consulte também a lista-negra global.
  # Veja a documentação em http://www.mediawiki.org/wiki/Extension:SpamBlacklist
  #<!-- mantenha esta linha exatamente assim --> <pre>
#
# A sintaxe é a seguinte:
#  * Tudo o que estiver após um "#" até o final de uma linha será tido como um comentário
#  * Todas as linhas que não estiverem em branco são um fragmento de expressão regular (regex) que abrangem apenas a URL especificada

  #</pre> <!-- mantenha esta linha exatamente assim -->',
	'spam-whitelist'     => '  #<!-- mantenha esta linha exatamente assim --> <pre>
# URLs externas que coincidam com esta lista *não* serão bloqueadas mesmo
# se tiverem sido bloqueadas por entradas presentes nas listas negras.
#
# A sintaxe é a seguinte:
#  * Tudo o que estiver após um "#" até o final de uma linha será tido como um comentário
#  * Todas as linhas que não estiverem em branco são um fragmento de expressão regular (regex) que abrangem apenas a URL especificada

  #</pre> <!-- mantenha esta linha exatamente assim -->',
	'spam-invalid-lines' => '{{PLURAL:$1|A entrada|As entradas}} a seguir {{PLURAL:$1|é uma expressão regular|são expressões regulares}}  (regex) {{PLURAL:$1|inválida e precisa|inválidas e precisam}} ser {{PLURAL:$1|corrigida|corrigidas}} antes de salvar a página:',
),

/** Russian (Русский)
 * @author .:Ajvol:.
 */
'ru' => array(
	'spam-blacklist'     => ' # Внешние ссылки, соответствующие этому списку, будут запрещены для внесения на страницы.
 # Этот список действует только для данной вики, существует также общий чёрный список.
 # Подробнее на странице http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- не изменяйте эту строку --> <pre>
#
# Синтаксис:
#   * Всё, начиная с символа "#" и до конца строки, считается комментарием
#   * Каждая непуская строка является фрагментом регулярного выражениея, применяемого только к узлу в URL

 #</pre> <!-- не изменяйте эту строку -->',
	'spam-whitelist'     => ' #<!-- не изменяйте эту строку --> <pre>
# Внешние ссылки, соответствующие этому списку, *не* будут блокироваться, даже если они попали в чёрный список.
#
# Синтаксис:
#   * Всё, начиная с символа "#" и до конца строки, считается комментарием
#   * Каждая непуская строка является фрагментом регулярного выражениея, применяемого только к узлу в URL

 #</pre> <!-- не изменяйте эту строку -->',
	'spam-invalid-lines' => '{{PLURAL:$1|Следующая строка чёрного списка ссылок содержит ошибочное регулярное выражение и должна быть исправлена|||Следующие строки чёрного списка ссылок содержат ошибочные регулярные выражения и должны быть исправлены}} перед сохранением:',
),

/** Slovak (Slovenčina)
 * @author Helix84
 */
'sk' => array(
	'spam-blacklist'     => '# Externé URLs zodpovedajúce tomuto zoznamu budú zablokované pri pokuse pridať ichna stránku.
# Tento zoznam ovplyvňuje iba túto wiki; pozrite sa tiež na globálnu čiernu listinu.
# Dokumentáciu nájdete na  http://www.mediawiki.org/wiki/Extension:SpamBlacklist
#<!-- nechajte tento riadok presne ako je --> <pre>
#
# Syntax je nasledovná:
#  * Všetko od znaku „#“ do konca riadka je komentár
#  * Každý neprázdny riadok je časť regulárneho výrazu, ktorému budú zodpovedať iba domény z URL

#</pre> <!-- nechajte tento riadok presne ako je -->',
	'spam-whitelist'     => '#<!-- leave this line exactly as it is --> 
<pre> 

# Externé URL zodpovedajúce výrazom v tomto zozname *nebudú* zablokované, ani keby
# ich zablokovali položky z čiernej listiny.
#
# Syntax je nasledovná: 
#   * Všetko od znaku # do konca riadka je komentár
#   * Každý neprázdny riadok je regulárny výraz, podľa ktorého sa budú kontrolovať názvy domén


</pre> <!-- leave this line exactly as it is -->',
	'spam-invalid-lines' => '{{PLURAL:$1|Nasledovný riadok|Nasledovné riadky}} čiernej listiny spamu {{PLURAL:$1|je neplatný regulárny výraz|sú neplatné regulárne výrazy}} a je potrebné {{PLURAL:$1|ho|ich}} opraviť pred uložením stránky:',
),

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
'stq' => array(
	'spam-blacklist'     => ' # Externe URLs, do der in disse Lieste äntheelden sunt, blokkierje dät Spiekerjen fon ju Siede.
 # Disse Lieste beträft bloot dit Wiki; sjuch uk ju globoale Blacklist.
 # Tou ju Dokumenation sjuch http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- Disse Riege duur nit ferannerd wäide! --> <pre>
#
# Syntax:
#   * Alles fon dät "#"-Teeken ou bit tou Eende fon ju Riege is n Kommentoar
#   * Älke nit-loose Riege is n regulären Uutdruk, ju der juun do Host-Noomen in do URLs wröiged wäd.

 #</pre> <!-- Disse Riege duur nit ferannerd wäide! -->',
	'spam-whitelist'     => ' #<!-- Disse Riege duur nit ferannerd wäide! --> <pre>
# Externe URLs, do der in disse Lieste äntheelden sunt, blokkierje dät Spiekerjen fon ju Siede nit, 
# uk wan jo in ju globoale of lokoale swotte Lieste äntheelden sunt.
#
# Syntax:
#   * Alles fon dät "#"-Teeken ou bit tou Eende fon ju Riege is n Kommentoar
#   * Älke nit-loose Riege is n regulären Uutdruk, die der juun do Host-Noomen in do URLs wröided wäd.

 #</pre> <!-- Disse Riege duur nit ferannerd wäide! -->',
	'spam-invalid-lines' => '{{PLURAL:$1
	| Ju foulgjende Siede in ju Spam-Blacklist is n uungultigen regulären Uutdruk. Ju mout foar dät Spiekerjen fon ju Siede korrigierd wäide
	| Do foulgjende Sieden in ju Spam-Blacklist sunt uungultige reguläre Uutdrukke. Do mouten foar dät Spiekerjen fon ju Siede korrigierd wäide}}:',
),

'sv' => array(
	'spam-blacklist' => '
 # Den här listan stoppar matchande externa URL:er från att läggas till på sidor.
 # Listan påverkar bara den här wikin; se även den globala svarta listan för spam.
 # För dokumentation se http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- ändra inte den här raden --> <pre>
#
# Syntaxen är följande:
#   * All text från ett #-tecken till radens slut är en kommentar
#   * Alla icke-tomma rader används som reguljära uttryck för att matcha domännamn i URL:er

 #</pre> <!-- ändra inte den här raden -->',
	'spam-whitelist' => '
 #<!-- ändra inte den här raden --> <pre>
# Externa URL:er som matchar den här listan blockeras *inte*,
# inte ens om de är blockerade genom den svarta listan för spam.
#
# Syntaxen är följande:
#   * All text från ett #-tecken till radens slut är en kommentar
#   * Alla icke-tomma rader används som reguljära uttryck för att matcha domännamn i URL:er

 #</pre> <!-- ändra inte den här raden -->',
	'spam-invalid-lines' =>
	"Följande {{PLURAL:$1|rad|rader}} i svarta listan för spam" .
	" innehåller inte något giltigt reguljärt uttryck " .
	" och måste rättas innan sidan sparas:\n",
),

'yue' => array(
	'spam-blacklist' => '
 # 同呢個表合符嘅外部 URL 當加入嗰陣會被封鎖。
 # 呢個表只係會影響到呢個wiki；請同時參閱全域黑名單。
 # 要睇註解請睇 http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- 請完全噉留番呢行 --> <pre>
#
# 語法好似下面噉:
#   * 每一個由 "#" 字元開頭嘅行，到最尾係一個註解
#   * 每個非空白行係一個標準表示式碎片，只係會同入面嘅URL端核對

 #</pre> <!-- 請完全噉留番呢行 -->',
	'spam-whitelist' => '
 #<!-- 請完全噉留番呢行 --> <pre>
# 同呢個表合符嘅外部 URL ，即使響黑名單項目度封鎖，
# 都*唔會*被封鎖。
#
# 語法好似下面噉:
#   * 每一個由 "#" 字元開頭嘅行，到最尾係一個註解
#   * 每個非空白行係一個標準表示式碎片，只係會同入面嘅URL端核對

 #</pre> <!-- 請完全噉留番呢行 -->',
	'spam-invalid-lines' =>
	"下面響灌水黑名單嘅{{PLURAL:$1|一行|多行}}有無效嘅表示式，" .
	"請響保存呢版之前先將{{PLURAL:$1|佢|佢哋}}修正:\n",
),

'zh-hans' => array(
	'spam-blacklist' => '
 # 跟这个表合符的外部 URL 当加入时会被封锁。
 # 这个表只是会影响到这个wiki；请同时参阅全域黑名单。
 # 要参看注解请看 http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- 请完全地留下这行 --> <pre>
#
# 语法像下面这样:
#   * 每一个由 "#" 字元开头的行，到结尾是一个注解
#   * 每个非空白行是一个标准表示式碎片，只是跟里面的URL端核对

 #</pre> <!-- 请完全地留下这行 -->',
	'spam-whitelist' => '
 #<!-- 请完全地留下这行 --> <pre>
# 跟这个表合符的外部 URL ，即使在黑名单项目中封锁，
# 都*不会*被封锁。
#
# 语法像下面这样:
#   * 每一个由 "#" 字元开头的行，到结尾是一个注解
#   * 每个非空白行是一个标准表示式碎片，只是跟里面的URL端核对

 #</pre> <!-- 请完全地留下这行 -->',
	'spam-invalid-lines' =>
	"以下在灌水黑名单的{{PLURAL:$1|一行|多行}}有无效的表示式，" .
	"请在保存这页前先将{{PLURAL:$1|它|它们}}修正:\n",
),

'zh-hant' => array(
	'spam-blacklist' => '
 # 跟這個表合符的外部 URL 當加入時會被封鎖。
 # 這個表只是會影響到這個wiki；請同時參閱全域黑名單。
 # 要參看註解請看 http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- 請完全地留下這行 --> <pre>
#
# 語法像下面這樣:
#   * 每一個由 "#" 字元開頭的行，到結尾是一個註解
#   * 每個非空白行是一個標準表示式碎片，只是跟裡面的URL端核對

 #</pre> <!-- 請完全地留下這行 -->',
	'spam-whitelist' => '
 #<!-- 請完全地留下這行 --> <pre>
# 跟這個表合符的外部 URL ，即使在黑名單項目中封鎖，
# 都*不會*被封鎖。
#
# 語法像下面這樣:
#   * 每一個由 "#" 字元開頭的行，到結尾是一個註解
#   * 每個非空白行是一個標準表示式碎片，只是跟裡面的URL端核對

 #</pre> <!-- 請完全地留下這行 -->',
	'spam-invalid-lines' =>
	"以下在灌水黑名單的{{PLURAL:$1|一行|多行}}有無效的表示式，" .
	"請在保存這頁前先將{{PLURAL:$1|它|它們}}修正:\n",
),

);

$messages['zh'] = $messages['zh-hans'];
$messages['zh-cn'] = $messages['zh-hans'];
$messages['zh-hk'] = $messages['zh-hant'];
$messages['zh-sg'] = $messages['zh-hans'];
$messages['zh-tw'] = $messages['zh-hant'];
$messages['zh-yue'] = $messages['yue'];
