-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2013 at 12:49 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beersnobs`
--
CREATE DATABASE IF NOT EXISTS `beersnobs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `beersnobs`;

-- --------------------------------------------------------

--
-- Table structure for table `beer`
--

CREATE TABLE IF NOT EXISTS `beer` (
  `beer_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`beer_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beer`
--

INSERT INTO `beer` (`beer_name`, `type`, `description`, `image`) VALUES
('Blue Moon', 'belgian', 'Blue Moon Belgian White, a Belgian-style witbier brewed by Blue Moon Brewing Co. originally in Golden, Colorado, was launched in 1995. Blue Moon Brewing Co.', 'img/uploaded/BlueMoon.jpg'),
('Bud Light', 'light-beer', 'Introduced in 1982 as Budweiser Light, Budweiser''s flagship light beer with 4.2% ABV and 110 calories per 12 US fl oz (355 mL) serving (1,300 kJ/L).', 'img/uploaded/BudLight.jpg'),
('Budweiser', 'american-lager', 'Budweiser  is a pale lager produced by Anheuserâ€“Busch InBev. Introduced in 1876 by Adolphus Busch it has grown to become one of the highest selling beers in the United States, and is available in over 80 markets worldwide.', 'img/uploaded/Budweiser.jpg'),
('Coors Light', 'light-beer', 'Coors Light is a 4.2% ABV light Beer brewed in Golden, Colorado. It was first produced in 1978 by the Coors Brewing Company.\r\n\r\nThe beer has a "Cold Certified" label which turns the mountains on the label from white to blue when the beer''s temperature is lowered to 4 degrees Celsius (39 degrees Fahrenheit).', 'img/uploaded/CoorsLight.jpg'),
('Fat Tire', 'belgian', 'The Fat Tire recipe originates from a co-founder''s bicycle trip through Belgium from brewery to brewery. The company promotes its Fat Tire ale locally by the public placement of colorful vintage bicycles outside its brewery, which is located adjacent to the public bike path along the Cache La Poudre River.', 'img/uploaded/FatTire.jpg'),
('Heineken', 'import', 'Heineken Lager Beer was first brewed by Gerard Adriaan Heineken in 1873. The beer is made of purified water, malted barley, hops, and yeast.', 'img/uploaded/Heineken.jpg'),
('Kingfisher', 'import', 'Kingfisher is an Indian beer brewed by United Breweries Group, Bangalore.', 'img/uploaded/Kingfisher.jpg'),
('Lagunitas IPA', 'ale', 'The IPA is Lagunitas Brewing Company''s flagship beer; it is described as moderately hoppy and well balanced. Copious Cascade and Centennial hops with Crystal malt. "An IPA built to make you want another sip."', 'img/uploaded/LagunitasIPA.jpg'),
('Michelob Ultra', 'light-beer', 'Michelob is a 5% abv pale lager developed by Adolphus Busch in 1896 as a "draught beer for connoisseurs". It was named after Michelob Michelob, a Bohemian brewmaster from Saaz, in the region famous for its Saaz hops.', 'img/uploaded/MichelobUltra.jpg'),
('Miller High Life', 'american-lager', 'This beer was put on the market in 1903 and is Miller Brewing''s oldest brand. High Life is grouped under the pilsner category of beers and is 4.6% ABV. The prevailing slogan on current packaging is "The Champagne of Beers", an adaptation of its long standing slogan "The Champagne of Bottle Beers". Accordingly, this beer is noted for its high level of carbonation, making it a very bubble-filled beverage, like champagne.', 'img/uploaded/MillerHighLife.jpg'),
('Miller Lite', 'light-beer', 'Miller Lite is a 4.2% abv pale lager brand sold by MillerCoors of Chicago, Illinois, United States.[1] Miller Lite competes with Anheuser-Busch''s Bud Light beer.', 'img/uploaded/MillerLite.jpg'),
('Negra Modelo', 'import', 'Negra Modelo is a 5.4% abv Vienna lager first brewed in Mexico by Austrian immigrants, and was introduced as a draft beer in 1926.', 'img/uploaded/NegoModelo.png'),
('Newcastle Brown Ale', 'ale', 'Newcastle Brown Ale (colloquially "Newkie Brown" (UK), "Newcastle" (US) or "Dog" (North East of England)) is a brown ale best known in the North East of England. ', 'img/uploaded/NewcastleBrownAle.jpg'),
('Pabst Blue Ribbon', 'american-lager', 'Pabst Blue Ribbon (PBR) is an American brand of beer sold by Pabst Brewing Company, originally established in Milwaukee, Wisconsin, in 1844, but now based in Los Angeles. Pabst Blue Ribbon is contract-brewed in six different breweries around the U.S. in facilities owned by Miller Brewing Company (a few of which were actually Pabst breweries at one time).', 'img/uploaded/PabstBlueRibon.jpg'),
('Rolling Rock', 'american-lager', 'Rolling Rock is a 4.6% abv pale lager launched in 1939 by the Latrobe Brewing Company. Although founded as a local beer in Western Pennsylvania, it was marketed aggressively and eventually became a national product. The brand was sold to Anheuser-Busch of St. Louis, Missouri, in mid-2006, which transferred brewing operations to New Jersey.', 'img/uploaded/RollingRock.jpg'),
('Shock Top', 'belgian', 'Shock Top is a 5.2% abv Belgian-style wheat ale introduced under the name Spring Heat Spiced Wheat brewed in Fort Collins, Colorado as a seasonal beer in 2006, then all year from 2007.', 'img/uploaded/ShockTop.jpg'),
('Sierra Nevada Pale Ale', 'ale', 'Sierra''s flagship Pale Ale has been described as "a balance between aggressive hops and hearty malt flavor", with its Cascade hops offering a grapefruit aroma and fruity palate.', 'img/uploaded/SierraNevadaPaleAle.jpg'),
('Stella Artois', 'belgian', 'Stella Artois, informally called Stella, is a pilsner beer of between 4.8 and 5.2% ABV. it has been brewed in Leuven, Belgium, since 1926, although it is brewed in other locations as well.', 'img/uploaded/StellaArtois.jpg'),
('Stone Arrogant Bastard Ale', 'ale', 'Stone Brewing Company''s Arrogant Bastard Ale is an American strong ale. Local designer/illustrator Thomas K. Matthews created the original gargoyle in 1996.', 'img/uploaded/StoneArrogantBastardAle.jpg'),
('Tsingtao', 'import', 'Tsingtao Beer, a well-hopped standard pilsner of 4.7% alcohol, is the flagship brew, accounting for most of the brewery''s production.', 'img/uploaded/Tsingtao.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `user` varchar(20) CHARACTER SET utf8 NOT NULL,
  `beer_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `taste` int(11) NOT NULL,
  `aroma` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`user`, `beer_name`, `date`, `taste`, `aroma`, `value`, `comment`, `id`) VALUES
('BeerMike', 'Stella Artois', '2013-12-02', 2, 1, 2, 'Sampled before and most recent on 9/6/13. Chilled down to 36 degrees in my beer cooler and poured into a Stella Artois gold-rimed glass. glass. Comes in a 11.2 ounce cool green bottle with a foil top that covers the crown even. Pours a straw yellow with a thick white head that hangs around awhile with decent lacing. Lots of tiny streaming bubbles rising the whole time until the end. The aroma was better than the last bottle I sampled. Maybe fresher? The aroma is still on the ''skunky'' side with some grains. The taste was some sweet grass and hops. Slightly better than the last time I tried it but that was probably because of the cool Stella glass I bought. LOL! Maybe better on draught? Never had it that way.\r\n\r\nServing type: bottle', 1),
('BeerMan', 'Heineken', '2013-12-02', 2, 2, 2, '12 oz. green Bottle. No freshness date, that I can find.\r\n\r\nA: Crystal clear with heavy carbonation. large white foamy head which turns\r\nthin within a few minutes. Almost no lacing to be found.\r\n\r\nS: Nothing smells like a Heineken. Sharp sulfur with cereal grains. This one\r\neven smells a little skunked. because of the green bottle.\r\n\r\nT/M: Smooth and on the crisp side. Grains. Light hop bitterness. Sulfur. Malts\r\nwant to come in but are left somewhere behind. So not much balance in this \r\nbeer. The finish is dry and kind of unsettling.\r\n\r\nO: It''s pretty bad. Drinkable, but bad. There are actually worse Euro Lagers out\r\nthere. I remember why I haven''t had one of these in years.\r\n\r\nCheers\r\n', 2),
('BeerGod', 'Kingfisher', '2013-12-02', 3, 4, 2, 'bottle from colonial spirits.\r\nPours a mostly clear medium golden color with a smallish white head that recedes quickly leaving a moderate amount of lace on the glass. Smells of light sweet bready malt with a hint of sulfur and very light spicy hops. The flavor is light sweet bready malt with light hop and little else. Medium to light body with a moderate level of carbonation and a slick watery mouthfeel. Straight forward macro lager, a bit on the sweet side but loaded with bland. I could drink this if I had to or if it were 105 degrees, but given the chance I would pick something else first.\r\n', 3),
('BeerDrinker', 'Negra Modelo', '2013-12-02', 4, 3, 4, 'I love this beer. The color is so dark and creamy.  The flavor is rich.', 4),
('Barry', 'Stella Artois', '2013-12-02', 4, 3, 3, 'Appearance: Had this one from the bottle, so I can''t really speak to how it looks in a glass. Good branding though, nice bottle look, and I like the paper around the neck. A sophisticated, clean look.\r\n\r\nSmell: Again, from the bottle, so not much to say here. Smells like beer, without too much else going on.\r\n\r\nTaste: Compared to other Euro Pale Lagers, this is a clear cut above the rest. A nice, crisp, clean taste, unadulterated with American corn sweetness. No skunkiness despite the green bottle.\r\n\r\nMouthfeel: Bubbly and spritzy, very lively carbonation initially.\r\n\r\nOverall: A simple beer and a crowd pleaser. A great, easy drinking party beer that is a clear step above the Football beers of the BMC ilk or Heineken family. One of the best Euro Pale Lagers I''ve had, and one I''d likely buy if hosting people who might night be keen on the craft scene.\r\n\r\nServing type: bottle', 5),
('AllAmericanMan', 'Heineken', '2013-12-02', 1, 1, 1, 'Smells bad, tastes bad, over-priced.', 6),
('Aaron Ramson', 'Budweiser', '2013-12-02', 3, 3, 4, 'Perfect clarity with a soapy, foamy white head that dissipated into soapy lacing. Nose is sweet, somewhat cloying, canned vegetables, grain husk. Taste follows nose with a sweet, sour, tangy sharpness with some slight bitterness at the end. Grain husk, slightly grassy and vegetal. Extremely crisp due to high carbonation, and mouthfeel is on the thin end of medium. American Budweiser isn''t nearly as bad as the pretentious beer snobs want to think it is, especially fresh on draft. Look at any of the reviews with low marks, how many people actually took the time out to review the beer and state why it "sucks"? It doesn''t. At all. Budweiser isn''t a microbrew, but it does take craft to brew something so ubiquitous yet satisfying. This beer will still be selling when the IPA fad goes the way of the dodo.', 13),
('Brad MacMullin', 'Miller High Life', '2013-12-02', 3, 2, 4, 'I can''t believe I never rated this. Alright, this is the low brow class of beers, but I tend to make this my ''go-to'' water beer. However I do enjoy the maltiness and carbonation of this beer. There is a consistency for this beer that makes me think it is very good value for the money. Now am I a sucker for the marketing and schtick of the ''champagne'' ads? Oh hell yeah. I like it a lot, but also think this is a good beer, that shouldn''t be the ugly sister of their Bud Lite and Coors Lite competition.', 14),
('Kyle Hanson', 'Pabst Blue Ribbon', '2013-12-02', 2, 3, 3, 'This is one of the better adjunct lagers I''ve had. It''s a little too sweet, probably because the adjunct ingredient happens to be corn syrup. Not as carbonated as BMC beers and looks a tad better. Still not great smelling though. Not as much of a corn, skunk, metal flavor like you''d expect. ', 15),
('Will Dixon', 'Rolling Rock', '2013-12-02', 3, 2, 4, 'The beer, if had out of a can, is a mistake. A 30 rack of this stuff just isn''t the way to go (bottles and cans is like day and night with RR). Buy a 12 pack and enjoy! Very smooth and drinkable for a night out or a winter holiday such as Christmas or especially New Year''s. A step above a typical Budweiser.', 16),
('David Chen', 'Bud Light', '2013-12-02', 2, 2, 3, 'Light body with a crisp hop presence that is immediately countered by an unpleasant, lingering metallic adjunct character.  Some crisp, grassy hop flavor but it''s killed off by hints of metal, corn and rice.  The adjuncts realy overpower what could be a decent tasting light lager.  The pale malts and hops are obliterated by the offensive lingering flavors.', 17),
('Nate Johnson', 'Coors Light', '2013-12-02', 2, 1, 3, 'I like the bottles. They have fun blue stuff on them to play with. Not sure how always being cold makes it any better since it sits in grocery store backrooms where it is not cold. It has a light yellow appearance and is fizzy. doesn''t have a lot of smell, except slightly skunky. Smooth until aftertaste. Then it just turns bad.', 18),
('Mike Moeller', 'Michelob Ultra', '2013-12-02', 1, 1, 2, 'Now that''s an awful beer! Cracked open a slim can as it was the last beer in the beer fridge, leftover from a cookout a few weekends ago. Drank about half of it while watching the sox game and the rest went warm. Eventually dumped it out and got a glass of water, which was much more satisfying and had just about as much flavor. Hitting the craft beer store tomorrow!', 19),
('Jack Trautz', 'Miller Lite', '2013-12-02', 1, 2, 1, 'Only drinkable in 90 degree weather. Wouldn''t use to make beer brats or water pan in my smoker unless it was the only choice. Don''t waste money on this beer if it is beer. Unfortunately, people will only drink this b/c of the light taste and think they''ll get hammered faster. Untrue, have one Revolution Anti-hero and see how the buzz goes. Why am I even reviewing Miller Lite?', 20),
('Terence Maynerd', 'Stone Arrogant Bastard Ale', '2013-12-02', 5, 5, 4, 'Arrogant Bastard Ale was a gorgeous reddish brown color. It has a thick, rocky, beige colored head with excellent retention and lacing. The smell was mainly piney hops with some sweet malt. The taste was piney hops and sweet caramel malt with balancing bitterness. The finish was long, hoppy and bitter. The mouthfeel was good with a medium-full body and medium body. Overall this is a very good, hoppy beer, and should be tried by any hop-lovers.', 21),
('Mario Davis', 'Lagunitas IPA', '2013-12-02', 4, 5, 4, 'Poured into a sam adams glass, nice full, thick, white head developed with great lacing and retention. Appearance was a clear golden orange. Had a great aroma, very hoppy with strong citrus and spice notes. Nice hoppy and crisp taste with spice, floral and citrus notes. Medium to full mouthfeel with dry and krisp aftertaste.', 22),
('Danny Tucker', 'Tsingtao', '2013-12-02', 4, 4, 4, 'Tsingtao Pure Draft Beer has a thick, spongy, white head and a clear, bubbly, straw appearance, with minimal lacing left behind. The aroma is of sweet, light, barley malt, and the flavor is of the same, with a perfectly placed hop balance at the end of the sip. Mouthfeel is light and watery, and Tsingtao Pure Draft Beer finishes crisp, clean, refreshing, and drinkable. Overall, this is excellent, and I love it. ', 23),
('Glenda Walton', 'Blue Moon', '2013-12-02', 3, 4, 3, 'I want to type up so much about this beer, but I probably shouldn''t. I will say that it was my gateway beer. It introduced me to the fact there is so much more to beer than Bud or Miller. For a mass produced wheat, Blue Moon has a lot going on. It looks murky and scary, but tastes terrific for a big brewer beer. Strong orange and grapefruit notes. Smooth and fizzy like I think a wheat beer should be. Drink this one with a burger and fries and just relax... A mass produced domestic that is as good as Blue Moon is rather hard to find, imo.', 24),
('Donald Green', 'Newcastle Brown Ale', '2013-12-02', 4, 4, 5, 'New Castle Brown Ale is one of my favorite beers around. I don''t know why it gets poor scores and ratings. Nice nutty aroma and very well balanced. I''ve started getting my brother in law in this beer and he only drinks Budweiser. although the ABV is low you can still enjoy socially and not worry about pissing every 5 minutes like most other beers here in the states.', 25),
('Walter Marinez', 'Shock Top', '2013-12-02', 3, 2, 3, 'To put it simply, this is basically Budweiser with some orange thrown in there. That''s pretty much all that I got out of this, in all aspects. Not the best of this style by any means; there are FAR better Witbiers out there...FAR BETTER. But if you''re just looking for an easily drinkable beer and you''re on a budget, I''d have to say this is better than most of the piss beers out there.', 26),
('Eric Schwartz', 'Sierra Nevada Pale Ale', '2013-12-02', 5, 4, 5, 'This is the original, quintessential American PAle Ale, absolutely my go to beer, it''s fucking delicious, entirely sessionable and widely distributed! This brew is a golden copper color with a nice white head some thin lacing left on the glass. The aroma is sweet and hoppy as is the flavour. The flavour is very well balanced. The malt is sweet like honey and contrasts the bitterness of the American hops perfectly. I don''t see this as a world class beer to be sipped out of snifters or a beer to impress anyone. To me, its just a great beer that goes perfect with any occasion any time of year. As i said this is my go to beer i drink it all the time. Perhaps you should too.', 27),
('Will Leong', 'Blue Moon', '2013-12-02', 4, 3, 4, 'Blue Moon is my all-time favorite beer! I love going out with my girlfriends and ordering a tall blue moon with a nice fruity orange slice on the rim!', 28);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
