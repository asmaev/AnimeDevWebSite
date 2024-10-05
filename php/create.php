<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");

include_once('connex.inc.php');

$pdo = connexion('base.db');


//$pdo->query("UPDATE anime SET note=0");

//$pdo->exec("DROP TABLE users");

$us = "CREATE TABLE IF NOT EXISTS users(
pseudo VARCHAR(25) NOT NULL PRIMARY KEY ,
pwd VARCHAR(25) NOT NULL, 
statut INT DEFAULT 0
)";
$pdo->exec($us);

// $pdo->exec("DROP TABLE anime");

$an = "CREATE TABLE IF NOT EXISTS anime(
nom VARCHAR(25) NOT NULL PRIMARY KEY ,
image VARCHAR(25),
type VARCHAR(25) NOT NULL, 
nb_ep VARCHAR(5),
annee INT,
note INT DEFAULT 0,
resume VARCHAR(500)
)";
$pdo->exec($an);

//$pdo->exec("DROP TABLE comment");

$cm = "CREATE TABLE IF NOT EXISTS comment(
id INT  NOT NULL DEFAULT 0 ,
nom VARCHAR(25),
anime VARCHAR(25),
comment VARCHAR(255),
FOREIGN KEY (nom) REFERENCES users(pseudo) ON DELETE CASCADE,
FOREIGN KEY (anime) REFERENCES anime(nom) ON DELETE CASCADE,
PRIMARY KEY (id)
)";

$pdo->exec($cm);

//$pdo->exec("DROP TABLE watchlist");

$cm = "CREATE TABLE IF NOT EXISTS watchlist(
pseudo VARCHAR(25),
anime VARCHAR(25),
FOREIGN KEY (pseudo) REFERENCES users(pseudo),
FOREIGN KEY (anime) REFERENCES anime(nom),
PRIMARY KEY (pseudo,anime)
)";

$pdo->exec($cm);

//$pdo->exec("DROP TABLE note");

$cm = "CREATE TABLE IF NOT EXISTS note(
pseudo VARCHAR(25),
anime VARCHAR(25),
note INT,
FOREIGN KEY (pseudo) REFERENCES users(pseudo),
FOREIGN KEY (anime) REFERENCES anime(nom),
PRIMARY KEY (pseudo,anime)
)";

$pdo->exec($cm);

// $ps="Nacim23";
// $md=md5("Tengen23");
// $stmt=$pdo->prepare("INSERT INTO users VALUES (:ps,:md,1)");
// $stmt->bindParam(':ps',$ps);
// $stmt->bindParam(':md',$md);
// $stmt->execute();

// $ps="Asmae";
// $md=md5("Noufoussi");
// $stmt=$pdo->prepare("INSERT INTO users VALUES (:ps,:md,1)");
// $stmt->bindParam(':ps',$ps);
// $stmt->bindParam(':md',$md);
// $stmt->execute();

// $ps="Admin";
// $md=md5("pdwadmin");
// $stmt=$pdo->prepare("INSERT INTO users VALUES (:ps,:md,1)");
// $stmt->bindParam(':ps',$ps);
// $stmt->bindParam(':md',$md);
// $stmt->execute();



$pdo->exec("DELETE FROM anime WHERE nom='One piece'");

$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('One piece','image1','shonen','1011','1997','Monkey D. Luffy rêve de retrouver ce trésor légendaire et de devenir le nouveau \"Roi des Pirates\". Après avoir mangé un fruit du démon, il possède un pouvoir lui permettant de réaliser son rêve. Il lui faut maintenant trouver un équipage pour partir à l''aventure !')");

$pdo->exec("DELETE FROM anime WHERE nom='Naruto'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Naruto','image2','shonen','720','1999','Dans le village de Konoha vit Naruto, un jeune garçon détesté et craint des villageois, du fait qu''il détient en lui Kyuubi (démon renard à neuf queues) d''une incroyable force, qui a tué un grand nombre de personnes.')");

$pdo->exec("DELETE FROM anime WHERE nom='Shingeki no kyojin'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Shingeki no kyojin','image3','seinen','95','2013','Dans un monde ravagé par des titans mangeurs d''homme depuis plus d''un siècle, les rares survivants de l''Humanité n''ont d''autre choix pour survivre que de se barricader dans une cité-forteresse. Le jeune Eren, témoin de la mort de sa mère dévorée par un titan, n’a qu''un rêve : entrer dans le corps d''élite chargé de découvrir l''origine des Titans et les annihiler jusqu''au dernier…' )");

$pdo->exec("DELETE FROM anime WHERE nom='Demon slayer'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Demon slayer','image4','shonen','44','2019',' Depuis les temps anciens, il existe des rumeurs concernant des démons mangeurs d''hommes qui se cachent dans les bois. Pour cette raison, les citadins locaux ne s''y aventurent jamais la nuit. La légende raconte aussi qu''un tueur déambule la nuit, chassant ces démons assoiffés de sang. Depuis la mort de son père, Tanjiro a pris sur lui pour subvenir aux besoins de sa famille. Malgré cette tragédie, ils réussissent à trouver un peu de bonheur au quotidien. Cependant, ce peu de bonheur se retrouve détruit le jour où Tanjiro découvre que sa famille s''est fait massacrer et que la seule survivante, sa sœur Nezuko, est devenue un démon. À sa grande surprise, Nezuko montre encore des signes d''émotion et de pensées humaines. Ainsi, commence la dure tâche de Tanjiro, celle de combattre les démons et de faire redevenir sa sœur humaine.' )");


$pdo->exec("DELETE FROM anime WHERE nom='JoJo'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('JoJo','image5','seinen','164','2012','En Angleterre, dans les années 1880, Jonathan, fils unique de la famille aristocrate Joestar, s''efforce de devenir un gentleman accompli. Son quotidien est bouleversé par l''adoption de Dio Brando, un jeune homme mystérieux du même âge.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Jujutsu kaisen'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Jujutsu kaisen','image6','shonen','24','2020','Itadori Yuji, lycéen et membre du club de spiritisme de son établissement, ne croit pas aux fantômes, mais participe au groupe, aimant l''ambiance… jusqu''à ce que les choses tournent mal. La relique qu''ils dénichent, le doigt sectionné d''une créature millénaire, attire les Fléaux incarnés en des monstres..' )");


$pdo->exec("DELETE FROM anime WHERE nom='Bleach'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Bleach','image7','shonen','366','2004','Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d''une belle Shinigami (un être spirituel) en train de pourchasser une âme perdue, un esprit maléfique qui hante notre monde et n''arrive pas à trouver le repos.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Fairy tail'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Fairy tail','image8','shonen','328','2009','Dans un monde magique au beau milieu du pays de Fiore, la jeune Lucy Heartfiria rejoint la Guilde Magique de Fairy Tail. L''attendent de nombreuses et palpitantes aventures aux côtés de Natsu Dragnir, Happy, Erza Scarlett et Grey Fullbuster.' )");

$pdo->exec("DELETE FROM anime WHERE nom='One punch man'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('One punch man','image9','shonen','24','2015','Saitama est un jeune homme sans emploi et sans réelle perspective d''avenir, jusqu''au jour où il décide de prendre sa vie en main. Son nouvel objectif : devenir un super-héros. Il s''entraîne alors sans relâche pendant trois ans et devient si puissant qu''il est capable d''éliminer ses adversaires d''un seul coup de poing.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Fruits basket'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Fruits basket','image10','shojo','63','2019','Tohru Honda, jeune orpheline de seize ans ayant perdu sa mère dans un tragique accident de voiture, vit seule dans une tente sur un terrain vague. C''était sans compter sur la générosité du propriétaire du terrain, Shigure Soma, qui lui propose de l''héberger le temps qu''elle retrouve un logement décent.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Haikyu'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Haikyu','image11','shonen','85','2014','Shôyô Hinata, surnommé Shô, aime plus que tout jouer au volley-ball et ce, malgré sa petite taille. Malheureusement, suite à une sévère défaite, son club de collège a été dissous, tous les membres étant partis. Mais Shô est bien décidé à jouer de nouveau et choisit son futur lycée en fonction de son ambition.' )");


$pdo->exec("DELETE FROM anime WHERE nom='Kuroko no basket'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Kuroko no basket','image12','shonen','78','2012','Les aventures de Tetsuyza Kuroko, un jeune garçon de 16 ans qui, sous son apparence chétive, cache un redoutable basketteur membre de la génération des miracles du collège Teiko. Tout juste arrivé au lycée de Seirin, il fait la connaissance de Taiga Kagami, jeune recrue fraîchement débarquée des États-unis.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Death note'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Death note','image13','shonen','37','2006','Death Note suit le lycéen Light Yagami qui trouve le monde actuel corrompu et désastreux. Un jour, il va tomber sur un cahier appelé « Death Note », qui tue toutes les personnes dont le nom est inscrit sur ses pages. Une découverte qui va bouleverser son quotidien.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Hunter x hunter'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Hunter x hunter','image14','shonen','148','2011','Abandonné par son père qui est un Hunter, à la fois un aventurier et un chasseur de primes, Gon décide à l''âge de 12 ans de partir pour devenir un Hunter. Cela ne sera pas chose aisée, il devra passer une suite de tests et examens en compagnie de milliers d''autres prétendants au titre de Hunter.' )");

$pdo->exec("DELETE FROM anime WHERE nom='My hero academia'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('My hero academia','image15','shonen','113','2014','Suite à une invitation, Izuku, All Might et les autres partent à l''étranger sur une île flottante nommée I Island. Sur cette île, des chercheurs du monde entier y travaillent. Izuku fera la rencontre de Mélissa qui vît sur cette fameuse île.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Given'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Given','image16','Boy''s love','11','2019','Ritsuka Uenoyama est un lycéen jouant de la guitare mais qui a perdu tout intérêt pour cet instrument. Un jour, il fait la rencontre de Mafuyu Sato possédant une guitare dont les cordes sont usées. Pour pouvoir récupérer son endroit où faire la sieste, Ritsuka lui propose de réparer sa guitare.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Akame ga kill'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Akame ga kill','image17','shonen','24','2014','Tatsumi est un combattant qui part pour la capitale à la recherche d''un moyen de gagner de l''argent pour aider son village pauvre. Après avoir été victime d''un vol par une femme et avoir perdu tout son argent, Tatsumi est pris en charge par une aristocrate du nom d''Aria. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Dragon ball'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Dragon ball','image18','shonen','125','1986',' Son Gokû est un petit garçon exceptionnellement doué pour les arts martiaux, qui possède une mystérieuse queue de singe. Le jour où il rencontre Bulma, ils partent ensemble à la recherche des sept boules de cristal... ' )");

$pdo->exec("DELETE FROM anime WHERE nom='No game no life'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('No game no life','image19','shonen','12','2014','Synopsis. Shiro et Sora, un couple de frère et sœur gamers, sont transportés dans un univers parallèle où la vie se résume à des jeux et où l''humanité est menacée d''extinction. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Inazuma eleven'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Inazuma eleven','image20','shonen','127','2008','Synopsis. Inazuma Eleven suit les aventures de la petite équipe de football du collège Raimon. On y suit l''évolution de Mark Evans, un jeune gardien de but, ainsi que de ses amis Axel Blaze, l''attaquant vedette de l''équipe, et Jude Sharp, meneur de jeu hors pair. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Fullmetal alchemist'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Fullmetal alchemist','image21','shonen','51','2003','Après avoir perdu leur mère, Edward et Alphonse tentent de la ramener à la vie grâce à l''alchimie. Cependant, l''alchimie doit obéir à la loi de l''échange équivalent : l''objet transformé et l''objet issu de la transformation doivent être de masses équivalentes. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Gintama'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Gintama','image22','shonen','328','2006','Vers la fin de l''ère d''Edo, l''histoire débute 20 ans après l''invasion de la Terre par des extraterrestres appelés les Amanto, « hommes du ciel ». Ces derniers, technologiquement très avancés, vont imposer leur loi : tout samouraï devra se défaire de son sabre sous peine de graves sanctions. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Code geass'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Code geass','image23','shonen','25','2008','Un jeune étudiant, Lelouch Lamperouge, a juré de détruire l''Empire Britannia. Son ambition va être servie par une mystérieuse jeune femme, classée par l''armée comme arme militaire. Cette dernière va offrir à Lelouch, le GEASS, le pouvoir des Rois qui lui permet d''imposer sa volonté à quiconque croise son regard. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Vinland saga'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Vinland saga','image24','seinen','24','2019','Mêlant personnages et évènements historiques avec de nombreux éléments fictifs, Vinland Saga est le récit de la vie d''un jeune islandais, Thorfinn Thorsson. Ce fils d''un illustre guerrier repenti verra sa vie basculer lorsque son père est assassiné par des pirates menés par le rusé Askeladd ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Your lie in April'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Your lie in April','image25','shonen','23','2011','Arima Kosei est un véritable prodige du piano : enfant, il dominait tous ses rivaux en compétition et s''était déjà fait un nom dans le domaine musical. Mais, après la mort de sa mère, il sombre dans une forte dépression qui l''amène à être dégoûté de son propre instrument. ' )");


$pdo->exec("DELETE FROM anime WHERE nom='Ansatsu kyōshitsu'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Ansatsu kyōshitsu','image26','shonen','76','2015','Koro Sensei devient enseignant de la classe 3-E de l''école de Kunugigaoka. Après avoir détruit la Lune et promis de faire exploser la Terre, ses élèves tentent de l''arrêter. Unis par un lien mystérieux, ils ont un an pour achever leur mission. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Ballroom e youkoso'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Ballroom e youkoso','image27','shonen','24','2017','Adaptation du manga Ballroom e Youkoso de Takeuchi Tomo. Tatara Fujita est un jeune homme n''ayant ni rêve, ni passion et ne sachant quoi faire de son futur. Alors qu''il est racketté par d''anciens camarades de classe, il est sauvé par Kaname Sengoku, un danseur de salon professionnel. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Detective conan'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Detective conan','image28','shonen','1038','1996',' Conan Edogawa L''histoire suit les aventures de Shinichi Kudo (aussi connu sous le nom de Jimmy Kudo dans Case Closed), un jeune détective prodige qui a été, sans le vouloir, rapetissé dans le corps d''un enfant à cause d''un poison qu''on lui a forcé à ingurgiter par des membres d''un syndicat criminel.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Food war'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Food war','image29','seinen','24','2015',' Sôma Yukihira rêve de devenir chef cuisinier dans le restaurant familial et ainsi surpasser les talents culinaires de son père. Alors que Sôma vient juste d''être diplômé au collège, son père Jôichirô Yukihira ferme le restaurant pour partir cuisiner à travers le monde.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Akatsuki no Yona'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Akatsuki no Yona','image30','shojo','27','2009','Yona, la jeune et insouciante princesse du royaume de Kôka, mène une vie de rêve choyée par le roi et protégée par son garde du corps et ami d''enfance, le puissant guerrier, Hak. Elle rêve de pouvoir unir sa vie à Soo-Won, son cousin dont elle est secrètement amoureuse. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Tate no yuusha'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Tate no yuusha','image31','seinen','25','2019','Naofumi se voit un jour invoqué dans un monde fantastique avec trois autres personnes afin de devenir les héros de ce monde. Dès leur arrivée, chacun se retrouve équipé d''une des quatre armes légendaires où Naofumi hérite d''un simple bouclier considéré comme le plus inutile des quatre équipements ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Magi'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Magi','image32','seinen','25','2012','Jeune garçon insouciant et curieux, Aladin a pour ami un puissant djinn enfermé dans une flûte nommé Ugo. C''est alors qu''il rencontre Ali Baba, qu''ils décident tous deux de partir à l''aventure, explorant des labyrinthes à la recherche de précieux écrins enchantés. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Maid sama'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Maid sama','image33','shojo','28','2010','Dans son lycée, Misaki, la présidente des élèves, terrorise les garçons en leur imposant des règles strictes pour préserver la tranquillité des filles ! D''autre part, depuis que son père les a abandonnées, elle est obligée de travailler après les cours. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Owari no seraph'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Owari no seraph','image34','seinen','12','2015','L''histoire nous entraîne au côté de Yûichirô Hyakuya, un esclave chargé de donner son sang à des aristocrates. Ayant perdu son frère lors de son évasion, Yûichirô se promet de tuer tous les vampires, et pour cela, il rejoint la résistance pour délivrer les esclaves. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Vampire knight'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Vampire knight','image35','shojo','26','2008','Yûki est une jeune fille de 15 ans, née le 8 décembre , qui a perdu la mémoire il y a dix ans de cela. Elle rencontre un vampire terrifiant qui veut boire son sang alors qu''elle est perdue dans un endroit enneigé. Heureusement, un vampire au sang pur nommé Kaname Kuran la sauve. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Yuri on ice'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Yuri on ice','image36','Boy''s love','12','2016','L''animé raconte l''histoire de Yuri Katsuki, un jeune patineur artistique japonais qui décide de se relancer  dans la compétition après une série de douloureuses défaites. Son idole, le champion russe Victor Nikiforov, devient à sa grande surprise son entraîneur. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Tokyo ghoul'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Tokyo ghoul','image37','seinen','12','2011','À Tokyo, sévissent des goules, monstres cannibales se dissimulant parmi les humains pour mieux s''en nourrir. Étudiant timide, Ken Kaneki est plus intéressé par la jolie fille qui partage ses goûts pour la lecture que par ces affaires sordides, jusqu''au jour où il se fait attaquer par l''une de ces fameuses créatures. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Tokyo revengers'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Tokyo revengers','image38','shonen','24','2021',' Tokyo Revengers suit les aventures de Takemichi Hanagaki, un jeune homme d''une vingtaine d''années qui apprend que son ex-petite amie a été tuée par un groupe de voyous. La série est toujours en cours.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Nanatsu no taizai'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Nanatsu no taizai','image39','shonen','96','2014','Il y a dix ans, un groupe de mercenaires appelé les Seven Deadly Sins s''est rebellé contre les Chevaliers Sacrés, la garde du royaume… Depuis, ils ont disparu et personne ne sait ce qu''ils sont devenus. ' )");

$pdo->exec("DELETE FROM anime WHERE nom='Sword art online'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Sword art online','image40','shonen','96','2012',' En 2022, l''humanité a réussi à créer une réalité virtuelle. Grâce à un casque, les humains peuvent se plonger entièrement dans le monde virtuel en étant comme déconnectés de la réalité, et Sword Art Online est le premier MMORPG a utiliser ce système.' )");

$pdo->exec("DELETE FROM anime WHERE nom='Another'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Another','image41','seinen','12','2009',' En 1972, dans l''établissement de Yomiyama au Japon, une jeune nommée Yomiyama Misaki meurt dans un accident mystérieux. Ses camarades de la classe 3-3, très attristés et ne voulant pas y croire, décident de faire comme si elle était encore en vie jusqu''à la fin de l''année, lors de la remise des diplômes.' )");


$pdo->exec("DELETE FROM anime WHERE nom='Orient'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Orient','image42','shonen','12','2022','L''histoire se déroule au 15e siècle dans un monde en proie aux Oni, des créatures maléfiques profondément respectés par les humains qui ne connaissent pas leur véritable nature.Seuls les Bushi, de courageux guerriers, sont conscients du danger que ces démons représentent. Malheureusement, ils sont réprouvés par la société et condamnés à vivre dans la honte, de peur qu''ils ne renversent l''ordre établi.Nous suivons désormais le quotidien de Musashi et son ami d''enfance Kojiro, deux descendants de Bushi, rêvant de parvenir à libérer le Japon de l''asservissement des Oni !Ensemble, ils sont bien décidés à fonder le plus puissant clan de Bushi que l''histoire ait jamais connu ! ' )");





$pdo->exec("DELETE FROM anime WHERE nom='Black clover'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Black clover','image43','shonen','170','2017','Dans un monde régi par la magie, Yuno et Asta ont grandi ensemble avec un seul but en tête : devenir le prochain Empereur-Mage du royaume de Clover. Mais si le premier est naturellement doué, le deuxième, quant à lui, ne sait pas manipuler la magie. C''est ainsi que lors de la cérémonie d''attribution de leur grimoire, Yuno reçoit le légendaire grimoire au trèfle à quatre feuilles tandis qu''Asta, lui, repart bredouille. Or, plus tard, un ancien et mystérieux ouvrage noir décoré ''un trèfle à cinq feuilles surgit devant lui ! Un grimoire d''anti-magie… ')");


$pdo->exec("DELETE FROM anime WHERE nom='Parasite'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Parasite','image44','seinen','24','2014','Shinichi, jeune lycéen, est un « hôte » dont le cerveau a miraculeusement été épargné : et pour cause, Migi, son parasite, a pris possession de son bras droit ! Ce cas exceptionnel va déboucher sur une singulière cohabitation.')");

$pdo->exec("DELETE FROM anime WHERE nom='Go toubun'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Go toubun','image45','shonen','12','2019','Fuutarou Uesugi obtient toujours les meilleures notes de son établissement, il est cependant plutôt antisocial et insensible. Un jour, une jeune fille s''assied à sa table et lui demande d''être son tuteur, il refuse et finissent par se disputer. Quelques heures plus tard, Uesugi reçoit un appel de sa sœur qui lui apprend que leur famille est endettée mais qu''ils ont la possibilité de s''en sortir si Uesugi accepte un travail de tutorat pour une famille riche. Il s''avère que son élève n''est autre que Itsuki Nakano, la personne à qui il a refusé d''enseigner, ainsi que de ses quatre sœurs. Pour pouvoir régler ce gros problème de dettes, il va devoir réconcilier les sœurs Nakano avec les études.')");

$pdo->exec("DELETE FROM anime WHERE nom='Toaru'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Toaru','image46','seinen','24','2008','L''histoire se déroule dans un univers où la magie et les pouvoirs surnaturels existent et se focalise autour d''un lycéen, Toma Kamijo, qui a le pouvoir d''annuler toutes magies ou pouvoirs. Toma Kamijo va faire la rencontre d''une nonne qui est poursuivie parce qu''elle a dans son cerveau une connaissance interdite...')");

$pdo->exec("DELETE FROM anime WHERE nom='Love of kill'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Love of kill','image47','shojo','12','2022','La tranquille chasseuse de primes Chateau et le mystérieux et puissant tueur à gages Ryang-ha s''affrontent et deviennent ennemis après ce combat. Du moins, ils auraient dû, mais pour une raison étrange, Ryang-ha s''attache à Chateau et commence à la suivre partout.')");

$pdo->exec("DELETE FROM anime WHERE nom='Re zero'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Re zero','image48','seinen','25','2016','Subaru Natsuki fait la connaissance d''une jeune fille aux longs cheveux d''argent qui l''entraîne dans une dimension peuplée de monstres et d''ennemis en tous genres particulièrement hostiles. Le jeune homme a juré de la protéger, mais il ne résiste pas longtemps dans ce monde violent où il est tué rapidement.')");

$pdo->exec("DELETE FROM anime WHERE nom='Bunny girl senpai'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Bunny girl senpai','image49','shojo','13','2018','Il existe une rumeur, cette dernière concerne un mystérieux phénomène appelé syndrome de l''adolescence. Sakuta Azusagawa est un jeune lycéen qui fait la rencontre de Mai Sakurajima, alors qu''elle se promène dans une bibliothèque déguisée en bunny girl. Pour une raison étrange, les gens autour d''elle ne peuvent plus la voir. Mai est en fait son aînée au lycée ainsi qu''une ancienne actrice célèbre qui s''est retirée de l''industrie du cinéma suite à un désaccord avec sa mère. Pourquoi était-elle devenue invisible et comment régler ce problème ? En cherchant à résoudre ce mystère, Sakuta va commencer à comprendre la complexité des sentiments de Mai.')");

$pdo->exec("DELETE FROM anime WHERE nom='Noragami'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Noragami','image50','shonen','12','2014','Yato est un dieu mineur dont le rêve est de devenir la divinité la plus vénérée du pays, avec son propre temple et ses cérémonies. Pour ce faire, il exauce n''importe quelle demande contre une rémunération de 5 yens. Au cours de l''une de ses missions, il manque de se faire écraser par un bus qu''il évite grâce à une lycéenne, Hiyori Iki. N''ayant pu éviter le véhicule, la jeune fille verra alors son âme se séparer de son corps lorsqu''elle s''endort. Refusant de rester dans cet état, Hiyori demandera à Yato de l''aider à retrouver son état originel. En attendant de trouver une solution, sa condition va lui permettre de découvrir un autre univers collé au sien, qui est aussi fascinant que dangereux : le monde des esprits.')");

$pdo->exec("DELETE FROM anime WHERE nom='Bungou stary dogs'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Bungou stary dogs','image51','seinen','12','2016','Atsushi Nakajima vient d''être exclu de son orphelinat, maintenant il n''a aucun endroit où aller et aucune nourriture. Tandis qu''il se tient près d''une rivière, étant sur le point de mourir de faim, il sauve un homme faisant une tentative de suicide. Cet homme est Osamu Dazai, lui et son partenaire Kunikida sont les membres d''une agence policière très spéciale. Ils possèdent des pouvoirs surnaturels et traitent les cas d''affaires qui sont trop dangereux pour la police ou l''armée.')");

$pdo->exec("DELETE FROM anime WHERE nom='Platinum end'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Platinum end','image52','seinen','24','2021','Un jeune homme au bord du suicide est sauvé par Nasse, un ange qui lui confie plusieurs flêches détentrices de pouvoir. Très vite, Mirai réalise qu''il existe d''autres personnes accompagnées d''ange, mais qu''une seule d''entre elle accèdera au rang de Dieu.')");

$pdo->exec("DELETE FROM anime WHERE nom='Love is war'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Love is war','image53','shojo','12','2019','Kaguya Shinomiya, vice-présidente du conseil des élèves ne voit pas l''amour comme tout le monde. Pour elle, c''est un combat qu''elle doit livrer avec la personne dont elle est amoureuse, Miyuki Shirogane, qui n''est autre que le président du conseil des élèves et qui partage une vision de l''amour assez similaire. Bien que tous les deux éprouvent des sentiments réciproques, leur orgueil fait que le premier qui osera se déclarer devra alors se soumettre à l''autre...')");

$pdo->exec("DELETE FROM anime WHERE nom='Spy x family'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Spy x family','image54','shonen','12','2022','Twilight, le plus grand espion du monde, doit pour sa nouvelle mission créer une famille de toutes pièces afin de pouvoir s''introduire dans la plus prestigieuse école de l''aristocratie. Totalement dépourvu d''expérience familiale, il va adopter une petite fille en ignorant qu''elle est télépathe, et s''associer à une jeune femme timide, sans se douter qu''elle est une redoutable tueuse à gages. Ce trio atypique va devoir composer pour passer inaperçu, tout en découvrant les vraies valeurs d''une famille unie et aimante.')");

$pdo->exec("DELETE FROM anime WHERE nom='Darling in the franx'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Darling in the franx','image55','seinen','24','2018','L''histoire se déroule dans un univers où la Terre n''est plus qu''un immense désert balayé par les vents. Pour survivre, les humains ont bâti des écosystèmes mobiles et immenses, protégés par un dôme et baptisés Plantation. Mais ces structures, abritant également les villes, sont régulièrement menacées par les Kyôryû (Klaxosaur) des créatures extrêmement dangereuses attirées par les matières forées par les Plantations. Les FRANXX, unités mobiles contrôlées par deux pilotes, sont les seules armes efficaces contre les Kyôryû. Malheureusement, elles sont rares car les pilotes, toujours un homme et une femme, doivent être parfaitement synchronisés pour les contrôler. Hiro, ou Code 016, a été entraîné pour devenir pilote au sein de la Plantation 13. Il n''a cependant jamais pu se coordonner avec sa partenaire et a perdu tout espoir. Jusqu''au jour où il croise Zero Two, une étrange jeune fille mi-humaine, mi-kyôryû avec laquelle il est capable de piloter. Le hic, c''est que d''après la rumeur, tous les partenaires de la jeune femme décèdent rapidement.')");

$pdo->exec("DELETE FROM anime WHERE nom='Gambling school'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Gambling school','image56','seinen','10','2018','Jabami Yumeko est élève dans l''établissement un peu particulier de Hyakkaou au sein duquel existe un système de caste basé sur les talents des élèves dans les jeux de hasard. Sous ses airs discrets, Yumeko cache en fait une redoutable perspicacité, une mémoire d''éléphant et un sens de la manipulation à toute épreuve qui vont lui permettre de faire son chemin à Hyakkaou.')");

$pdo->exec("DELETE FROM anime WHERE nom='Black butler'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Black butler','image57','shonen','41','2008','Ciel Phantomhive est un comte de douze ans, vivant dans un immense manoir en bordure du Londres du XIXème siècle. S''il arrive à gérer la compagnie de fabrication de jouets et de confiseries léguée par ses aïeuls, c''est sans doute parce qu''il est efficacement secondé par Sebastian, son majordome. Majordome qui n''est autre qu''un démon avec qui il a fait un pacte...')");

$pdo->exec("DELETE FROM anime WHERE nom='Blue exorcist'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Blue exorcist','image58','shonen','25','2011','Rin okumura, un ado de 15 ans adopté par un exorciste dès son plus jeune âge découvre un jour qu''il est le fils du Malin. Son père, Satan en personne, lui apparaît pour l''emmener dans son monde, mais le jeune garçon ne peut oublier tout ce qui lui a été enseigné jusqu''ici.')");

$pdo->exec("DELETE FROM anime WHERE nom='Charlotte'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Charlotte','image59','seinen','13','2015','L''histoire nous entraîne dans un monde où certains enfants, durant la puberté, développent des pouvoirs spéciaux. Yuu Otosaka, à la capacité de pouvoir se glisser et de contrôler entièrement le corps d''une personne, mais seulement durant cinq secondes. Yuu a utilisé cette compétence durant des années pour atteindre ses objectifs, ce qui lui a permis de pouvoir rentrer dans un lycée prestigieux. Un jour, il est pris la main dans le sac par l''énigmatique, Nao Tomori. Ne pouvant plus reculer, lui et sa sœur Ayumi sont contraints d''être transférés à l''Académie Hoshi-no-umi, un établissement pour des étudiants aux capacités surnaturelles. ')");

$pdo->exec("DELETE FROM anime WHERE nom='Doctor stone'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Doctor stone','image60','shonen','24','2019','Un jour, une lumière brillante apparaît subitement dans le ciel pétrifiant en une fraction de seconde l''humanité entière. Des millénaires plus tard, Taiju parvient à briser son enveloppe de pierre et découvre un monde où le genre humain a disparu de la surface de la terre. Avec son ami Senku, ils décident de récréer la civilisation à partir de zéro !')");

$pdo->exec("DELETE FROM anime WHERE nom='Fire force'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Fire force','image61','shonen','24','2019','Le monde est horrifié par le phénomène de combustion humaine où l''humanité peut s''enflammer à tout moment. Des brigades spéciales Fire Force ont donc été créées avec pour mission d''éclaircir le mystère de ce phénomène. On suit ainsi le jeune Shinra Kusakabe, surnommé le Démon, qui vient d''intégrer la 8e brigade dans le seul but de devenir un héros et de connaitre la vérité sur l''incendie qui a coûté la vie de sa famille il y a douze ans !')");

$pdo->exec("DELETE FROM anime WHERE nom='Horimiya'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Horimiya','image62','shojo','13','2021',' Bien qu''admirée à l''école pour sa gentillesse et ses prouesses académiques, Kyôko Hori est cependant différente chez elle. Avec ses parents souvent absents pour travailler, Hori doit s''occuper de son jeune frère et faire le ménage, l''empêchant ainsi de se socialiser en dehors de l''école.')");

$pdo->exec("DELETE FROM anime WHERE nom='Kill la kill'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Kill la kill','image63','shonen','24','2013','L''académie Honnōji, un lycée dans lequel règne la peur et la terreur. Celui ci est gouverné par le redoutable conseil des élèves, qui ont la particularité d''utiliser des uniformes Goku. Ces derniers leurs permettent d''être plus fort que n''importe qui, et d''écraser quiconque se dresse sur leur route. Ryūko Matoi est une fille qui transporte avec elle une moitié de ciseaux géant, et recherche le possesseur de l''autre moitié qui s''avère être l''assassin de son père. Dans le but de trouver le meurtrier, Ryūko rentre dans l''académie Honnōji pour y défier Satsuki Kiryūin, la présidente du conseil des élèves...')");

$pdo->exec("DELETE FROM anime WHERE nom='Persona 5'");
$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('Persona 5','image64','seinen','26','2018','On suit un jeune lycéen qui vient d''arriver à Tokyo après un malheureux incident. Très vite, il devra faire face à des évènements qui vont changer son quotidien lorsqu''il réveillera sa Persona. Au fur et à mesure, entre sa vie de lycéen la journée et celle de Voleur Fantôme le soir, il va découvrir des facettes obscures du monde qui l''entoure...')");

//$pdo->exec("DELETE FROM anime WHERE nom=''");
//$pdo->exec("INSERT INTO anime (nom,image,type,nb_ep,annee,resume) VALUES ('','','','','','')");



