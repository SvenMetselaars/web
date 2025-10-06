-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 mei 2024 om 09:08
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameworld`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `about`
--

INSERT INTO `about` (`about_id`, `about_text`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `blog_author` varchar(255) NOT NULL,
  `blog_date` date NOT NULL,
  `blog_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_category_id`, `blog_author`, `blog_date`, `blog_info`) VALUES
(1, 'ADD SONS OF THE FOREST!!!1!!', 1, 'Piet van de Bergen', '2024-01-05', 'Immersive Gameplay: Building upon the success of its predecessor, Sons of the Forest offers immersive gameplay that combines survival, exploration, and horror elements. Players will find themselves thrust into a mysterious and dangerous world where they must navigate treacherous environments, gather resources, and fend off hostile creatures to survive.\r\n<br><br>\r\nStriking Visuals: The game boasts stunning visuals that bring its lush forests, eerie caves, and haunting landscapes to life. From detailed character models to atmospheric lighting effects, Sons of the Forest delivers a visually captivating experience that draws players deeper into its world.\r\n<br><br>\r\nDynamic Storytelling: With an intriguing narrative that unfolds as players explore the game world and uncover its secrets, Sons of the Forest offers dynamic storytelling. Branching paths, hidden lore, and unexpected twists keep players engaged and eager to discover what lies ahead.\r\n<br><br>\r\nChallenging Survival Mechanics: Survival lies at the heart of Sons of the Forest, requiring players to utilize their wits and skills to endure in the unforgiving wilderness. Crafting tools and weapons, hunting for food, and building shelter are just some of the challenges players will face, testing their resourcefulness and adaptability.\r\n<br><br>\r\nTerrifying Enemies: The forest is home to a variety of terrifying enemies, from mutated creatures to hostile tribes. Players must strategize and use stealth, combat, and evasion techniques to overcome these threats and survive encounters with dangerous foes.\r\n<br><br>\r\nCooperative Multiplayer: Sons of the Forest offers cooperative multiplayer, allowing players to team up with friends to tackle challenges together. Whether exploring the wilderness, building fortifications, or facing off against enemies, cooperative play adds a new dimension to the game and fosters camaraderie among players.\r\n<br><br>\r\nCommunity Engagement: The Sons of the Forest community is passionate and engaged, discussing theories, sharing gameplay experiences, and creating fan content. Being part of such a vibrant community enhances the overall gaming experience, fostering a sense of camaraderie and belonging among players.\r\n<br><br>\r\nOverall, Sons of the Forest promises to deliver an unforgettable gaming experience with its immersive gameplay, stunning visuals, dynamic storytelling, challenging survival mechanics, terrifying enemies, cooperative multiplayer, and vibrant community.'),
(2, 'I love PS5', 3, 'Steve Blogs', '2024-01-24', 'The PS5 is awesome for a multitude of reasons. First and foremost, its hardware represents a significant leap forward in gaming technology. The custom CPU and GPU architecture deliver unparalleled performance, resulting in smoother frame rates, faster load times, and breathtaking visual fidelity. This means that games look and feel more immersive than ever before, drawing players deeper into their virtual worlds.\r\n<br><br>\r\nFurthermore, the PS5 introduces innovative features that enhance gameplay experiences. The DualSense controller, with its advanced haptic feedback and adaptive triggers, provides tactile sensations that add a new layer of realism to games. Feeling the tension of a bowstring or the rumble of a roaring engine creates a deeper connection between the player and the game world.\r\n<br><br>\r\nThe inclusion of an ultra-high-speed SSD drastically reduces load times, ensuring that players spend less time waiting and more time playing. Seamless transitions between gameplay scenes and near-instantaneous fast-travel contribute to a smoother and more immersive gaming experience overall.\r\n<br><br>\r\nAdditionally, the PS5\'s backward compatibility feature allows players to enjoy their existing PS4 game collections on the new console. This means that players can seamlessly transition to the PS5 while still having access to their favorite titles from previous generations.\r\n<br><br>\r\nExclusive games are another reason why the PS5 is so awesome. Sony Interactive Entertainment\'s own PlayStation Studios, along with other renowned developers, have created a lineup of exclusive games that showcase the full potential of the console. From epic AAA titles to innovative indie gems, the PS5 offers a diverse range of experiences that cater to all types of players.\r\n<br><br>\r\nIn summary, the PS5\'s combination of cutting-edge hardware, innovative features, backward compatibility, and exclusive games makes it an incredibly compelling gaming console. Whether you\'re a casual gamer or a dedicated enthusiast, the PS5 offers an unparalleled gaming experience that pushes the boundaries of what\'s possible in gaming.'),
(3, 'mario 3d all stars', 2, 'katie jones', '2024-02-09', 'Mario 3D All-Stars is a delightful celebration of some of the most iconic games in the Mario franchise. Bringing together Super Mario 64, Super Mario Sunshine, and Super Mario Galaxy, this collection offers both nostalgia for longtime fans and a chance for newer players to experience classic titles.\r\n<br><br>\r\nEach game in the collection brings its own unique charm and gameplay mechanics. Super Mario 64, with its groundbreaking 3D platforming, laid the foundation for many modern games and remains a joy to play even decades after its release. Super Mario Sunshine introduces players to the sunny and vibrant Isle Delfino, offering a different take on Mario\'s platforming adventures with the addition of FLUDD, Mario\'s water-spraying companion. Finally, Super Mario Galaxy takes players on a cosmic journey through imaginative worlds, with gravity-defying gameplay mechanics that still feel fresh and innovative.\r\n<br><br>\r\nWhile the collection is a wonderful opportunity to revisit these beloved games, it\'s not without its flaws. Some fans have expressed disappointment with the lack of additional features or enhancements, such as updated graphics or additional content. Additionally, the limited availability of the game, as it was released as a timed exclusive for the Nintendo Switch, left some players feeling frustrated.\r\n<br><br>\r\nOverall, Mario 3D All-Stars is a fantastic collection that offers hours of fun and nostalgia for fans of the Mario series. While it may not be perfect, its timeless gameplay and beloved characters make it a worthwhile addition to any Nintendo Switch library.'),
(4, 'Xbox', 3, 'anonimus', '2024-02-19', 'Imagine, if you will, a mischievous sprite masquerading as a gaming console – the Xbox. With its devilish charm, it tempts unsuspecting players into its digital realm, only to subject them to its peculiar quirks and frustrations.\n<br><br>\nFirstly, there\'s the matter of reliability. Like a trickster deity, the Xbox seems to have a penchant for mischief, occasionally succumbing to inexplicable technical gremlins that disrupt gaming sessions at the most inopportune times. It\'s as if the console has a secret agenda to keep players on their toes, forever questioning when the next glitch will strike.\n<br><br>\nAnd let\'s not overlook the notorious Xbox Live service, a digital playground where lag and connectivity issues reign supreme. It\'s like a twisted game of Russian roulette – will your online match proceed smoothly, or will you be subjected to the whims of a temperamental server?\n<br><br>\nThen there\'s the library of exclusive titles, or rather, the lack thereof. Like a barren wasteland devoid of treasure, the Xbox\'s exclusive game lineup can sometimes leave players feeling underwhelmed and uninspired. It\'s as if the console\'s developers have misplaced the key to the kingdom, leaving players longing for the magic of truly captivating exclusives.\n<br><br>\nAnd finally, there\'s the user experience itself, which can feel like navigating a labyrinth of confusing menus and convoluted interfaces. It\'s as if the Xbox delights in testing players\' patience, daring them to unravel its cryptic mysteries and unearth its hidden treasures.\n<br><br>\nOf course, these exaggerated criticisms are all in good fun. In reality, the Xbox offers a wealth of gaming experiences and services that cater to a diverse audience of players. But hey, a little playful ribbing never hurt anyone, right?'),
(5, 'gta 5 opinion', 2, 'idk', '2024-03-03', 'Grand Theft Auto V (GTA 5) is an absolute powerhouse of a game, offering an expansive open-world experience that\'s as immersive as it is ambitious. Rockstar Games has crafted a virtual playground that feels alive and teeming with possibilities, whether you\'re cruising down the streets of Los Santos in a stolen car, embarking on a daring heist with friends, or simply soaking in the vibrant atmosphere of the city.\r\n<br><br>\r\nOne of the most remarkable aspects of GTA 5 is its attention to detail. From the bustling city streets to the sprawling countryside, every inch of the game world is meticulously crafted, creating a sense of realism that\'s unparalleled in the gaming industry. Whether you\'re exploring iconic landmarks, interacting with colorful NPCs, or engaging in chaotic shootouts, the world of GTA 5 feels alive and dynamic at every turn.\r\n<br><br>\r\nThe game\'s narrative is another standout feature, weaving together the stories of three distinct protagonists – Michael, Franklin, and Trevor – in a gripping tale of crime, corruption, and redemption. Each character brings their own unique perspective and motivations to the table, resulting in a rich and multifaceted storyline that keeps players invested from start to finish.\r\n<br><br>\r\nOf course, it wouldn\'t be GTA without its trademark blend of chaos and mayhem, and GTA 5 certainly delivers in that regard. Whether you\'re causing havoc with friends in the online multiplayer mode, engaging in high-speed pursuits with the police, or simply wreaking havoc on the unsuspecting citizens of Los Santos, there\'s no shortage of adrenaline-pumping action to be found.\r\n<br><br>\r\nBut beyond its thrills and spectacle, GTA 5 also offers a surprisingly deep and thought-provoking exploration of contemporary society. Through its satirical humor and biting social commentary, the game offers a reflection of the world we live in, inviting players to question their own beliefs and values in the process.\r\n<br><br>\r\nIn summary, GTA 5 is more than just a game – it\'s a sprawling epic that pushes the boundaries of what\'s possible in interactive entertainment. With its stunning visuals, engaging narrative, and unparalleled sense of freedom, it\'s no wonder that GTA 5 continues to captivate players around the world, even years after its initial release.'),
(6, 'Please add Minecraft', 1, 'Mojang', '2024-03-18', 'Adding Minecraft to your workshop would be a fantastic decision because it offers a multitude of benefits for both you and your customers.\r\n<br><br>\r\nFirstly, Minecraft is incredibly popular and has a massive player base worldwide. By adding it to your workshop, you instantly tap into this existing market of players who are passionate about the game and eager to explore new content and experiences related to it.\r\n<br><br>\r\nSecondly, Minecraft has immense creative potential. It\'s not just a game; it\'s a platform for creativity, collaboration, and exploration. By offering Minecraft-related products or workshops in your workshop, you provide an opportunity for customers to engage with their favorite game in new and exciting ways. Whether it\'s through building workshops, modding tutorials, or merchandise inspired by the game, there are endless possibilities for creative expression.\r\n<br><br>\r\nMoreover, Minecraft appeals to a wide range of demographics, from children to adults, casual gamers to hardcore enthusiasts. This broad appeal means that adding Minecraft to your workshop can attract a diverse customer base and expand your reach.\r\n<br><br>\r\nAdditionally, Minecraft has educational value. It\'s widely used in schools and educational settings to teach subjects like math, science, history, and coding. By incorporating Minecraft-related educational materials or workshops into your offerings, you can appeal to educators, parents, and students who are looking for engaging and interactive learning experiences.\r\n<br><br>\r\nLastly, Minecraft has longevity. Since its release in 2009, it has continued to evolve and grow, with regular updates and new content being added by the developers. This means that adding Minecraft-related products or workshops to your workshop is a sustainable investment that can continue to generate interest and revenue over time.\r\n<br><br>\r\nOverall, adding Minecraft to your workshop is a smart move that can attract a wide audience, foster creativity and collaboration, offer educational opportunities, and provide long-term value for your business.\r\n<br><br>\r\ni need the money');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog_categorys`
--

CREATE TABLE `blog_categorys` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `blog_categorys`
--

INSERT INTO `blog_categorys` (`category_id`, `category_name`) VALUES
(1, 'New products'),
(2, 'products'),
(3, 'consoles');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog_comments`
--

CREATE TABLE `blog_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_blog_id` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `comment_blog_id`, `comment_name`, `comment_text`) VALUES
(1, 1, 'Mojang', 'Please add minecraft'),
(2, 5, 'hater', 'dont have a opinion any more'),
(3, 6, 'Dream', 'dont bother i am already to good at it '),
(4, 2, 'Steve Blogs', 'could not agree with you more'),
(5, 4, 'xboxLover', 'HOW DEAR YOU SAY THAT'),
(6, 3, 'xavier versteegde', 'i also like that it is 3 of my favorite games in one'),
(7, 3, 'aaaaahhhhhh5555555', 'aaaaaaaaaaaaa44444444444 4444eeeeeeeeeeeeennnnnn nnngggggeeeemssssssssssss'),
(8, 4, 'Steve Blogs', 'I like ps5 more two'),
(9, 1, 'Koen Jansen', 'I understand that you like Sons of the forest but you dont have to scream it'),
(10, 4, 'Joep Molennaar', 'why is this Steve Blogs guy everywhere'),
(11, 2, 'xboxLover', 'F*ck off'),
(12, 5, 'hater hater', 'says the hater'),
(13, 2, 'pc_case_fan', 'Stupid ps5 you need to switche to pc gaming its better stronger smaaaarter');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'arcade'),
(2, 'race'),
(3, 'action'),
(4, 'survival'),
(5, 'storymode'),
(6, 'horror'),
(7, 'sport');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `consoles`
--

CREATE TABLE `consoles` (
  `console_id` int(11) NOT NULL,
  `console_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `consoles`
--

INSERT INTO `consoles` (`console_id`, `console_name`) VALUES
(1, 'nintendo switch'),
(2, 'ps5'),
(3, 'xbox series x');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nav`
--

CREATE TABLE `nav` (
  `nav_id` int(11) NOT NULL,
  `nav_name` text NOT NULL,
  `nav_link` varchar(255) NOT NULL,
  `nav_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `nav`
--

INSERT INTO `nav` (`nav_id`, `nav_name`, `nav_link`, `nav_img`) VALUES
(1, 'Home', 'index.php?category=index', ''),
(2, 'Products', '/3de_periode/91815_BprjWEDE_CD_lj1p3/products.php?product=index', ''),
(3, 'Shopping cart', 'winkelwagen.php?product=index', ''),
(4, 'blog', 'blog.php?page=index', ''),
(5, 'Contact', 'contact.php', ''),
(6, 'About us', 'about.php', ''),
(7, 'login', 'login.php?page=login', 'img/unorderd/usericon.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_product_amount` int(11) NOT NULL,
  `order_product_price` int(11) NOT NULL,
  `order_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_product_id`, `order_product_amount`, `order_product_price`, `order_date`) VALUES
(1, 1, 12, 1, 47, 'Wednesday, 27 March 2024'),
(2, 1, 4, 1, 24, 'Wednesday, 27 March 2024'),
(3, 1, 28, 1, 64, 'Wednesday, 27 March 2024'),
(4, 2, 18, 1, 74, 'Thursday, 28 March 2024'),
(5, 2, 7, 1, 161, 'Thursday, 28 March 2024');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_info` text NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_rating` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_console_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_info`, `product_price`, `product_rating`, `product_img`, `product_console_id`, `product_category_id`) VALUES
(1, 'mario wonder', 'The game breaks away from the well-known New Super Mario Bros formula and presents itself in a completely new guise. Everything looks vibrant, and even the characters can change their expressions. Furthermore, the game features new level designs, power-ups, characters, and much more.', 49.99, '9.5/10', 'img/unorderd/marioWonder.jpg', 1, 1),
(2, 'mario party', 'Mario Party is a Nintendo series featuring multiplayer party games where players collect stars and coins on virtual boards. Popular characters like Mario and Luigi are playable. The game is known for its lively multiplayer experience, suitable for social gatherings and family fun.', 49.99, '9.4/10', 'img/unorderd/marioParty.jpg', 1, 1),
(3, 'just dance 2024', 'Dance your way to the top in Just Dance 2024 for Nintendo Switch. With 40 new songs.Follow the dancer\'s moves and achieve the highest score. Play at home with 5 friends in your living room or join a group. you can seamlessly dance online with Just Dance 2023 players. Use the Just Dance Controller App to easily dance along with your phone.', 29.99, '8.4/10', 'img/unorderd/justDance2024.jpg', 1, 7),
(4, 'mario smash bros', 'Super Smash Bros is a popular series of fighting games by Nintendo, featuring characters from various Nintendo franchises battling each other. Players aim to knock opponents out of the arena. The series includes iconic characters like Mario, Link, and Pikachu. Updates and new titles often introduce additional characters and features.\r\n\r\n\r\n\r\n\r\n', 24.99, '9.4/10', 'img/unorderd/smashBros.jpg', 1, 3),
(5, 'rayman legends', 'Rayman Legends is a colorful 2D platform game developed by Ubisoft. The sequel to Rayman Origins features various worlds with unique themes, cooperative multiplayer for four players, and standout musical levels. Originally released in 2013, it is known for its visual style, challenging gameplay, and vibrant presentation.\r\n\r\n\r\n\r\n\r\n', 29.99, '7,4/10', 'img/unorderd/rayman.jpg', 1, 5),
(6, 'mario kart 8', 'In Mario Kart 8 Deluxe for the Nintendo Switch, popular characters from the Mario series compete against each other on circuits in the Mushroom Kingdom, using various special items.\r\n\r\n\r\n\r\n\r\n', 49.99, '9,6/10', 'img/unorderd/card8.jpg', 1, 2),
(7, 'mario 3d all stars', 'Discover three of Mario\'s greatest 3D adventures with Super Mario 3D All-Stars on the Nintendo Switch! This special bundle includes Super Mario 64, Super Mario Sunshine, and Super Mario Galaxy, all optimized for the Nintendo Switch with enhanced HD graphics, Joy-Con controls, and a music player featuring the epic soundtracks of all three games!\r\n\r\n\r\n\r\n\r\n', 161.99, '9/10', 'img/unorderd/allstars.jpg', 1, 1),
(8, 'Luigi\'s Mansion 3', 'Luigi\'s Mansion 3 is an action-adventure game for the Nintendo Switch. Luigi explores a haunted hotel to rescue Mario and friends. Using his ghost-catching device, the Poltergust G-00, he must solve puzzles and capture ghosts. The game features cooperative multiplayer and has received praise for its charm and gameplay.\r\n\r\n\r\n\r\n\r\n', 49.39, '9.6/10', 'img/unorderd/mansion3.jpg', 1, 6),
(9, 'mario 3d world x bowsers fury', 'Join Mario, Luigi, Princess Peach, and Toad on a mission to save the Sprixie Kingdom in Super Mario 3D World + Bowser\'s Fury for the Nintendo Switch. Bowser has kidnapped the Sprixie Princess, and the heroes must rescue her. Additionally, this version of 3D World includes gameplay improvements and supports motion controls. The game is playable with up to 4 players.\r\n\r\n\r\n\r\n\r\n', 49.99, '9,2/10', 'img/unorderd/3dworld.jpg', 1, 1),
(10, 'mario odyssey', 'the game follows Mario on his quest to rescue Princess Peach, who is kidnapped by Bowser. It distinguishes itself with Mario\'s ability to capture various characters and objects using his hat, named Cappy. The game received praise for its creativity and gameplay.\r\n\r\n\r\n\r\n\r\n', 49.99, '9,6/10', 'img/unorderd/odyssey.jpg', 1, 1),
(11, 'spiderman2', 'Swing, jump, and use the new web wings to traverse Marvel\'s New York, swiftly switching between Peter Parker and Miles Morales to experience different stories and epic new powers. As the iconic villain Venom threatens their lives, city, and loved ones, the stakes are high in this Marvel adventure.\r\n\r\n\r\n\r\n\r\n', 69.99, '8,8/10', 'img/unorderd/spiderman2.jpg', 2, 3),
(12, 'horizon forbidden west', 'This is Horizon: Forbidden West for the Playstation 5 (PS5), a sequel to Horizon: Zero Dawn. Join Aloy as she braves the Forbidden West—a majestic yet perilous frontier hiding mysterious new threats.\r\n\r\n\r\n\r\n\r\n', 47.99, '9,8/10', 'img/unorderd/horizon.jpg', 2, 3),
(13, 'god of war ragnarok', 'Kratos and Atreus strive to remain hidden after attempting to alter their destinies. They train every day for the inevitable, relentlessly searching for ways to defy the prophesied future.\r\n\r\n\r\n\r\n\r\n', 67.98, '9,2/10', 'img/unorderd/godofwar.jpg', 2, 3),
(14, 'Star Wars Jedi: Survivor', 'Cal is one of the last remaining Jedi in the universe, and The Empire has targeted him. Set 5 years after the events of the previous installment, Cal will once again confront dangerous adversaries on new and familiar planets in the Star Wars universe. Unlock new skills and become a true Jedi master. Get ready for an epic journey in a galaxy far, far away.\r\n\r\n\r\n\r\n\r\n', 74.99, '9,4/10', 'img/unorderd/starwars.jpg', 2, 3),
(15, 'Gran Turismo 7', 'Take the wheel of various virtual race cars and race to the podium in Gran Turismo 7 for the PlayStation 5. Discover numerous new cars and embark on a new racing adventure to push them to their limits. Hop into your favorite Ford, Toyota, or iconic cars like the Porsche 911 and Nissan Skyline and speed across the finish line. This game supports up to 4 players.\r\n\r\n\r\n\r\n\r\n', 69.00, '9,2/10', 'img/unorderd/torismo7.jpg', 2, 2),
(16, 'the last of us 2', 'The Last of Us Part II is a critically acclaimed action-adventure game developed by Naughty Dog. Released in 2020, it follows Ellie\'s journey in a post-apocalyptic world. The game explores themes of revenge, morality, and the consequences of one\'s actions, delivering a powerful narrative and impressive gameplay.', 48.99, '10/10', 'img/unorderd/lastofus.jpg', 2, 3),
(17, 'Ratchet & Clank: Rift Apart', 'Ratchet & Clank: Rift Apart is a dynamic action-platformer exclusive to PlayStation 5. Developed by Insomniac Games, it features interdimensional travel, showcasing the console\'s power with seamless transitions between diverse worlds. Players control Ratchet and his new ally, Rivet, battling enemies and utilizing creative weaponry in a visually stunning adventure.', 49.99, '9,2/10', 'img/unorderd/riftappard.jpg', 2, 5),
(18, 'Ghost of Tsushima: Director\'s Cut', 'Ghost of Tsushima: Director\'s Cut is an enhanced version of the original action-adventure game for PlayStation 4 and PlayStation 5. Developed by Sucker Punch Productions, it includes additional content like the Iki Island expansion, featuring new storylines, locations, and activities. The Director\'s Cut utilizes the PS5\'s capabilities.', 74.98, '10/10', 'img/unorderd/heroshima.jpg', 2, 3),
(19, 'Sackboy: A Big Adventure', 'Sackboy: A Big Adventure is a 3D platformer developed by Sumo Digital. It features the iconic character Sackboy from the LittleBigPlanet series in a new adventure. Offering both solo and multiplayer modes, players navigate through vibrant levels, solving puzzles, and customizing their characters. The game focuses on cooperative gameplay and creativity.', 59.69, '9,8/10', 'img/unorderd/sackboy.jpg', 2, 5),
(20, 'FIFA 2024', 'Kick off your digital football season with EA Sports FC 24. Pursue glory in the career mode as a player for your favorite club or take on a managerial role. Play with friends in pro clubs or design your own club. From women\'s football to street football, everything is included. Explore the new additions, such as dynamic player packs and a variety of new icons and heroes.', 61.99, '8,2/10', 'img/unorderd/FIFA.jpg', 2, 7),
(21, 'forza horizon 5', 'Forza Horizon 5, released in November 2021, is an open-world racing game set in Mexico. Developed by Playground Games, it offers a diverse environment, a vast car lineup, and captivating gameplay. Praised for stunning visuals, it\'s part of the acclaimed Forza Horizon series, providing an immersive racing experience on Xbox Series X/S and PC.', 59.99, '9/10', 'img/unorderd/forza5.jpg', 3, 2),
(22, 'Call of Duty: Modern Warfare III', 'In the direct sequel to Call of Duty®: Modern Warfare® II, Captain Price and Task Force 141 are faced with the ultimate threat. Ultrationalist war criminal Vladimir Makarov is expanding his grip on the world, compelling Task Force 141 to fight like never before.', 54.99, '9/10', 'img/unorderd/callofduty.jpg', 3, 4),
(23, 'Hogwarts Legacy', 'Experience a rich, powerful world full of magic and action. Immerse yourself in a detailed, mysterious story that will captivate both fans and gamers, providing an authentic Wizarding World experience that will bring joy to both Harry Potter enthusiasts and RPG fans.', 43.99, '10/10', 'img/unorderd/hogwars.jpg', 3, 5),
(24, 'Avatar: Frontiers Of Pandora', 'You play as a Na\'vi who was abducted by the militaristic human corporation known as the RDA. You were molded to serve their purpose. Fifteen years later, you are free but a stranger in your homeland. Reconnect with your lost heritage and discover what it means to be Na\'vi by joining other clans to protect Pandora from the RDA.', 56.00, '8.6/10', 'img/unorderd/avatar.jpg', 3, 5),
(25, 'Assassin\'s Creed Valhalla', 'In this game, you play as Eivor, a brave Viking raised on tales of battles and glory. Explore a dynamic and beautiful open world set in the dark ages of England. Raid your enemies, expand your settlement, and build your political power to earn your place among the gods in Valhalla.', 29.95, '9,6/10', 'img/unorderd/assassins.jpg', 3, 3),
(26, 'Elden Ring Shadow Of The Erdtree', 'Land of Shadow. A place concealed by the Erdtree. Where the goddess Marika first set foot. A land purified in an unsung battle. Ignited in flames by Messmer. It was to this land that Miquella departed, freeing himself from his skin, his power, his origin. From all things golden. And now, Miquella awaits the return of his promised Lord.', 74.99, '9,8/10', 'img/unorderd/eldenring.jpg', 3, 3),
(27, 'Alone in the Dark', 'In this love letter to the groundbreaking original, experience a ghostly tale through the eyes of one of the two main characters. Play as Edward Carnby or Emily Hartwood and explore your surroundings, battle monsters, solve puzzles, and uncover the shocking truth of Derceto Manor...\r\n\r\n\r\n\r\n\r\n', 54.99, '9,4/10', 'img/unorderd/thedark.jpg', 3, 6),
(28, 'Dragon\'s Dogma 2', 'Dragon\'s Dogma 2 offers a richly detailed and deeply explorable fantasy world created using immersive physics, character AI, and the latest graphics from Capcom\'s RE ENGINE.', 64.99, '8,8/10', 'img/unorderd/dogma.jpg', 3, 3),
(29, 'Grand Theft Auto V', 'Los Santos: a vast, sun-soaked metropolis filled with self-help gurus, stars, and fading celebrities, once the envy of the Western world, now struggling to stay afloat in an era of economic uncertainty and cheap reality TV.', 19.79, '6/10', 'img/unorderd/gta.jpg', 3, 3),
(30, 'Expeditions - A Mudrunner Game', 'Embark on consistently rewarding scientific expeditions as you adapt to the challenges of nature and unravel the mysteries of unknown lands. Venture into the expansive wilderness, from arid deserts to rugged forests and towering mountains, packed with hidden treasures and forgotten ruins.', 39.99, '8/10', 'img/unorderd/expiditions.jpg', 3, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` text NOT NULL,
  `user_lastname` text NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_town` varchar(255) NOT NULL,
  `user_postalcode` varchar(255) NOT NULL,
  `user_street` varchar(255) NOT NULL,
  `user_housenumber` varchar(255) NOT NULL,
  `user_phonenumber` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_mail`, `user_town`, `user_postalcode`, `user_street`, `user_housenumber`, `user_phonenumber`, `user_password`, `user_role`) VALUES
(1, 'Sven', 'Metselaars', '91815@roc-teraa.nl', 'Melderslo', '5962 AH', 'Recktor Mulderstraat', '19', 610222577, '6a9dfc0d5da1e263277624742b3369e0', 'owner'),
(2, 'Thijs', 'van Bergen', '91967@roc-teraa.nl', 'Lieshout', '5737 ES', 'Lankelaar', '9', 624729512, 'd4d1ec6e8ec3bf8fa5b272ff1c84e635', 'customer'),
(3, 'Jeroen', 'Peeters', 'peetersjeroen123@gmail.com', 'Blerick', '5924BX', 'Brechtstraat', '15', 629811818, '40959440351d772fbcdce74c3a977365', 'customer');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexen voor tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_category_id` (`blog_category_id`);

--
-- Indexen voor tabel `blog_categorys`
--
ALTER TABLE `blog_categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexen voor tabel `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_blog_id` (`comment_blog_id`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexen voor tabel `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`console_id`);

--
-- Indexen voor tabel `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`nav_id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`order_product_id`),
  ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_console_id` (`product_console_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `blog_categorys`
--
ALTER TABLE `blog_categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `consoles`
--
ALTER TABLE `consoles`
  MODIFY `console_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `nav`
--
ALTER TABLE `nav`
  MODIFY `nav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categorys` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`comment_blog_id`) REFERENCES `blogs` (`blog_id`);

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_console_id`) REFERENCES `consoles` (`console_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
