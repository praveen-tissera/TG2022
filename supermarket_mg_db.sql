-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 04:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket_mg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `order_id` int(11) NOT NULL,
  `row_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`order_id`, `row_id`, `product_id`, `user_id`, `quantity`) VALUES
(1, 1, 2, 1, 1),
(1, 2, 1, 1, 2),
(2, 3, 2, 1, 1),
(3, 4, 1, 1, 2),
(4, 5, 1, 1, 2),
(5, 6, 2, 1, 1),
(5, 7, 1, 1, 1),
(6, 8, 2, 1, 1),
(7, 9, 1, 1, 1),
(8, 10, 2, 1, 1),
(9, 11, 10, 1, 5),
(10, 12, 9, 1, 1),
(11, 13, 2, 1, 3),
(12, 14, 2, 2, 1),
(13, 15, 10, 3, 1),
(13, 16, 5, 3, 3),
(13, 17, 13, 3, 1),
(14, 18, 2, 4, 4),
(17, 19, 17, 6, 3),
(18, 20, 25, 8, 1),
(19, 21, 25, 8, 1),
(20, 22, 25, 9, 1),
(22, 23, 25, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `availability` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `item_title`, `availability`) VALUES
(1, 'sugerssabc', 'yes'),
(2, 'suger', 'no'),
(3, 'suger', 'no'),
(4, 'suger', 'yes'),
(5, 'sugers', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_place_date` date NOT NULL,
  `order_place_time` time NOT NULL,
  `pickup_time` time NOT NULL,
  `staff_id` int(11) NOT NULL,
  `order_placed` enum('review','placed') NOT NULL,
  `order_status` enum('new','processing','completed','dispatch') NOT NULL,
  `dispatch_time` time NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `total`, `order_place_date`, `order_place_time`, `pickup_time`, `staff_id`, `order_placed`, `order_status`, `dispatch_time`, `payment_id`) VALUES
(9, 2, 5600, '2019-02-18', '22:12:00', '16:45:00', 2, 'placed', 'new', '00:00:00', 0),
(10, 3, 3960, '2019-02-18', '23:43:00', '17:30:00', 1, 'placed', 'new', '00:00:00', 0),
(11, 2, 4000, '2019-02-19', '00:19:00', '17:00:00', 1, 'placed', 'new', '00:00:00', 0),
(12, 4, 3000, '2019-02-19', '11:26:00', '17:30:00', 0, 'placed', 'new', '00:00:00', 0),
(13, 6, 3300, '2019-02-19', '21:15:00', '17:30:00', 2, 'placed', 'new', '00:00:00', 0),
(14, 6, 3000, '2019-02-19', '21:19:00', '17:15:00', 0, 'placed', 'new', '00:00:00', 0),
(15, 6, 2000, '2019-02-19', '22:04:00', '16:45:00', 0, 'placed', 'new', '00:00:00', 0),
(16, 6, 3000, '2019-02-19', '23:09:00', '17:00:00', 0, 'placed', 'new', '00:00:00', 0),
(17, 6, 720, '2020-01-21', '20:16:00', '09:15:00', 1, 'placed', 'processing', '00:00:00', 0),
(18, 8, 1, '2020-01-26', '10:26:00', '11:15:00', 0, 'placed', 'new', '00:00:00', 0),
(19, 8, 1, '2020-01-26', '10:39:00', '11:00:00', 0, 'placed', 'new', '00:00:00', 0),
(20, 9, 1, '2020-02-03', '23:08:00', '10:30:00', 1, 'placed', 'dispatch', '17:42:00', 3),
(21, 9, 0, '2023-01-25', '23:23:00', '08:30:00', 0, 'placed', 'new', '00:00:00', 3),
(22, 9, 0, '2023-01-25', '23:28:00', '08:30:00', 0, 'placed', 'new', '00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `txn_id` varchar(255) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `PayerStatus` varchar(50) NOT NULL,
  `PayerMail` int(100) NOT NULL,
  `Total` decimal(19,2) NOT NULL,
  `SubTotal` decimal(19,2) NOT NULL,
  `Tax` decimal(19,2) NOT NULL,
  `Payment_state` varchar(50) NOT NULL,
  `CreateTime` varchar(50) NOT NULL,
  `UpdateTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`txn_id`, `payment_id`, `PaymentMethod`, `PayerStatus`, `PayerMail`, `Total`, `SubTotal`, `Tax`, `Payment_state`, `CreateTime`, `UpdateTime`) VALUES
('2T609685ND249973K', 1, 'paypal', 'VERIFIED', 0, '1.00', '1.00', '0.00', 'completed', '2020-01-26T04:53:49Z', '2020-01-26T04:53:49Z'),
('73A14245DW820114X', 2, 'paypal', 'VERIFIED', 0, '1.00', '1.00', '0.00', 'completed', '2020-01-26T05:09:04Z', '2020-01-26T05:09:04Z'),
('8U797845YM694115U', 3, 'paypal', 'VERIFIED', 0, '1.00', '1.00', '0.00', 'completed', '2020-02-03T17:38:45Z', '2020-02-03T17:38:45Z'),
('7913633089861420T', 4, 'paypal', 'VERIFIED', 0, '0.01', '0.01', '0.00', 'completed', '2023-01-25T17:58:24Z', '2023-01-25T17:58:24Z');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(30) NOT NULL,
  `availability` enum('yes','no') NOT NULL,
  `currency` enum('LKR','Dollers','Pounds') NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_title`, `product_description`, `product_image`, `availability`, `currency`, `price`) VALUES
(1, 1, 'Pizza quattro stagion', 'Pizza quattro stagioni (four seasons pizza) is a variety of pizza in Italian cuisine that is prepared in four sections with diverse ingredients, with each section representing one season of the year.It is a very popular pizza in Italy, and has been described as a \"classic\", \"famous\" and \"renowned\"Italian pizza.Pizza quattro stagioni is typically prepared using artichokes, tomatoes or basil, mushrooms and ham or prosciutto, or olives. Baking it on a pizza stone can also prevent sogginess. It may be finished with olive oil drizzled atop the pizza. The pizza can be sliced into wedges or by its four sections.Pizza quattro stagioni can be prepared as a vegetarian dish. Serves for 2 person', 'pizza3.jpg', 'yes', 'LKR', '950.00'),
(2, 1, 'Pizza Prosciuto', 'Preheat oven to 450. Line a baking sheet with aluminum foil for easy clean up.\r\nStart by laying out the pizza crust. Then spread the garlic flavored oil over the crust.\r\nBreak apart the fresh mozzarella into little pieces and distribute around the whole pizza (there will be some spaces between the cheese.)\r\nTear the prosciutto pieces and distribute around the pizza (I like to put it in the spots where there\'s no cheese). Bake for 15-20 minutes until cheese has melted and some spots are golden brown.\r\nRemove from oven and sprinkle the arugula leaves around the pizza. Slice and serve!\r\n\r\nIt serves 3 to 4', 'pizza.jpg', 'yes', 'LKR', '650.00'),
(3, 2, 'Spaghetti Bolognese', 'Heat a large saucepan over a medium heat. Add a tablespoon of olive oil and once hot add the beef mince and a pinch of salt and pepper. Cook the mince until well browned over a medium-high heat (be careful not to burn the mince. It just needs to be a dark brown colour). Once browned, transfer the mince to a bowl and set aside.\r\n\r\nAdd another tablespoon of oil to the saucepan you browned the mince in and turn the heat to medium. Add the onions and a pinch of salt and fry gently for 5-6 minutes, or until softened and translucent. Add the garlic and cook for another 2 minutes. Add the grated carrot then pour the mince and any juices in the bowl back into the saucepan.\r\n\r\nAdd the tomatoes to the pan and stir well to mix. Pour in the stock, bring to a simmer and then reduce the temperature to simmer gently for 45 minutes, or until the sauce is thick and rich. Taste and adjust the seasoning as necessary.\r\n\r\nWhen ready to cook the spaghetti, heat a large saucepan of water and add a pinch of salt. Cook according to the packet instructions. Once the spaghetti is cooked through, drain and add to the pan with the bolognese sauce. Mix well and serve.', 'pasta1.jpg', 'yes', 'LKR', '290.00'),
(4, 1, 'Pizza Margherita', 'Prepare pizza dough through step 5, including preheating the oven to 475°F (246°C). Cover the shaped dough lightly with plastic wrap and allow it to rest as the oven preheats.\r\nMix the olive oil and chopped garlic together in a small dish. Brush the top of the dough lightly with olive oil. Using your fingers, push dents into the surface of the dough to prevent bubbling. Top with pizza sauce, then the mozzarella cheese slices, then the tomato slices.\r\nBake for 14-16 minutes or until the crust is lightly browned and the cheese is bubbling. For the last minute, I move the oven rack to the top rack to really brown the edges. That\'s optional.\r\n\r\nRemove from the oven and top with fresh basil and pepper. Slice pizza and serve immediately.', 'pizza1.jpeg', 'yes', 'LKR', '550.00'),
(5, 3, 'Zinger Burger', 'Mix flour, corn flour, rice flour and baking powder and put them a side.\r\nApply salt, black and white pepper on chicken’s breast both sides.\r\nBeat egg with salt, black and white pepper.\r\nNow apply egg on breast pieces and then coat them in flours, again apply egg and flour(you have to do a double coating)\r\nHeat the oil, deep fry the breast pieces on medium heat. Cover them with lid while frying.\r\nApply mayonnaise on each side of bun, then put chicken,  lettuce leave, and cheese slice. Finish it with other piece of bun on top.\r\nTip: add salt in flours, this will make the coating more tasty. It Serves Per head', 'brg2.jpg', 'yes', 'LKR', '550.00'),
(6, 1, 'Pizza Tandoori Paneer', 'In a medium sized bowl, toss in all the dry ingredients and mix.\r\nAdd water, and mix it in (I use my hands but a wooded spoon works too) until a soft dough forms.\r\nMix for at least 30 seconds.\r\nCover the bowl and set aside at room temperature for at least 2 hours.\r\nThe dough should be more than double in volume.\r\nWhen you’re ready to start the pizza: Pull out half the dough and spread onto a well oiled 13×18 inch rimmed baking sheet. (You can either freeze the other half of the dough or make 2 pizzas) I like to tear the dough into 4 pieces and put on all four corners of the sheet. Then I press it out and have them meet in the middle. The dough should make a thin layer covering the entire sheet tray.Mix and let marinade for 15 to 30 minutes.\r\nIt Serves to 2 people', 'pizza2.jpg', 'yes', 'LKR', '680.00'),
(7, 1, 'pizza Chicken cordon blue', 'Preheat oven to 425°. Unroll and press dough onto bottom of a greased 15x10x1-in. pan, pinching edges to form a rim if desired. Bake until edges are light brown, 8-10 minutes.\r\nSpread crust with Alfredo sauce; sprinkle with garlic salt. Top with remaining ingredients. Bake until crust is golden brown and cheese is melted, 8-10 minutes.\r\n\r\nServes for 2 People', 'pizza4.jpg', 'yes', 'LKR', '480.00'),
(8, 1, 'Sicilian Pizza', 'Combine 2 cups flour, yeast, and 1 1/2 teaspoons salt in a large mixing bowl; stir in 1 1/2 cups warm water and vegetable oil and\r\nBeat at low speed with an electric mixer for 1 to 2 min.\r\nTurn dough out onto a well-floured surface, and knead until smooth and elastic (about 5 minute,\r\nCover and let rise in a warm place (85°), free from drafts, 1 hour or until doubled in bulk.\r\n\r\n\r\nCover and let rise in a warm place, free from drafts, 45 minutes or until doubled in bulk.\r\n\r\nStep 7\r\nSauté onion and garlic in hot olive oil in a large skillet over medium-high heat until tender. Add remaining 1 teaspoon salt, tomatoes, and next 6 ingredients.\r\nBring to a boil; cook, covered, over medium heat 10 minutes. \r\n\r\n\r\nBake at 475° for 20 minutes. Sprinkle evenly with desired toppings; bake 10 to 15 more minutes. Garnish, if desired.\r\n\r\nPrep: 30 min.; Rise: 1 hr., 45 min.; Bake: 35 min\r\nServes for 2 Heads\r\n', 'pizza5.jpeg', 'yes', 'LKR', '340.00'),
(9, 2, 'Pasta Carbonara', 'Cook the linguine according to the package directions, reserving 1 1/2 cups of the cooking water.\r\n\r\nMeanwhile, in a large skillet, over medium-high heat, fry the bacon until crisp. Transfer to a paper towel-lined plate. Spoon off and discard all but 2 tablespoons of the bacon drippings.\r\n\r\nReturn skillet to medium heat, add the onion, and cook until tender, 3 to 4 minutes.\r\nWorking quickly, return the drained pasta to the pot along with the pasta water, bacon, and onion. Place the pot over low heat and cook, tossing frequently, until heated through. Remove from heat and quickly add the yolks, one at a time, stirring after each addition. Add the Parmesan and 1/2 teaspoon of the pepper and stir until the sauce thickens slightly.\r\n\r\nDivide among bowls. Top with additional Parmesan and the remaining pepper.\r\n\r\nServes for 2 people', 'pasta2.jpg', 'yes', 'LKR', '310.00'),
(10, 3, 'Portobello Mushroom Burger', 'Place the mushroom caps, smooth side up, in a shallow dish. In a small bowl, whisk together vinegar, oil, basil, oregano, garlic, salt, and pepper. Pour over the mushrooms. Let stand at room temperature for 15 minutes or so, turning twice.\r\nPreheat grill for medium-high heat.\r\nBrush grate with oil. Place mushrooms on the grill, reserving marinade for basting. Grill for 5 to 8 minutes on each side, or until tender. Brush with marinade frequently. Top with cheese during the last 2 minutes of grilling. It Serves Per head', 'brg1.jpg', 'yes', 'LKR', '380.00'),
(11, 3, 'Snacker Burger', 'In a large bowl, thoroughly combine the chicken, garlic, parsley, oregano, basil and lemon juice. Season it with salt and pepper.\r\nPut the bread crumbs on a small shallow dish.  Form the chicken mixture into about 15 small, thin patties, about 2 inches in diameter.  Press the patties into the bread crumbs to coat each side and set them aside on a plate.  (At this point you can refrigerate them for up to 24 hours or proceed with the recipe.)\r\nIn a large nonstick skillet, heat the oil over medium heat.  When the pan is nice and hot, cook the patties until they are browned on each side and cooked through, 8-10 minutes total.  If the patties are cooking too fast on the outside, reduce the heat and partially cover the pan for a few minutes so the insides will cook, too.  Serve them hot with honey mustard, barbecue sauce, ketchup, or your favorite condiments. It Serves Per Head', 'brg3.png', 'yes', 'LKR', '250.00'),
(12, 3, 'Big Boss Burger', 'Heat grill to high or medium-high. For 1/2 lb. burgers, make 4 large patties. For 1/3 lb. burgers, make 6 patties. Press down so the meat is larger than the bun, as it shrinks as it cooks. Press the center of the meat with thumb to make indention so the meat doesn\'t puff in the center.\r\nSeason generously on both sides with Lawry\'s seasoned salt or just salt and pepper.\r\nCook for 5-8 minutes per side or to desired degree of doneness. Top with cheese the last minute of cooking.\r\nTo make buttered mushrooms:\r\nHeat butter in a large skillet over medium-high. Arrange mushrooms in skillet in a single layer and cook until bottom side is golden brown, about 5 minutes. Season with a pinch of salt. Turn over mushrooms to continue to cook on the other side. Reduce heat if they are browning too quickly. Cook for 5-10 minutes longer. Repeat with sauteed onions.\r\nTo make Sriracha Sun Dried Tomato Aioli: in small bowl, combine ketchup and mayonnaise. Spread on hamburger buns.\r\nTo assemble Big Boss Burger:\r\nSpread aioli on both sides of bun. Top with beef, mushrooms, onions, and arugula. It Serves Per Head', 'brg4.jpg', 'yes', 'LKR', '580.00'),
(13, 4, 'Mini Sundae', 'Spoon 1/4 teaspoon chocolate sauce into each pastry cup.\r\n\r\nUsing a mini ice cream scoop, spoon about 1 tablespoon ice cream onto each pastry cup, rinsing the scoop with hot water after each.\r\n\r\nFreeze the filled cups for 30 minutes.  Top each with 1/2 teaspoon whipped cream and sprinkle with the peanuts.\r\n\r\nIt Serves Per Head', 'des2.png', 'yes', 'LKR', '180.00'),
(14, 4, 'Biscuit Pudding', 'Sieve the icing sugar two times and add it to a bowl. And then put the margarine to the same bowl,followed by coca powder and make chocolate icing.\r\nPour some hot milk(maintain the hotness in the milk by heating or boiling it up several times) in to a large plate and soak part of the biscuits(100g first). When you see the biscuits are bigger,remove and arrange them in the bottom of the pudding bowl. Fill the( arrange the biscuits in a round)bottom with soaked biscuits. Wait one or two minutes(to remove the hotness of the biscuits). Apply a very thin layer of chocolate icing. Make sure you cover the biscuit layer in the bottom also.\r\nThen take other 200g of biscuits and soak them in hot milk and fill a thick layer of as in the step two. Then apply the remaining chocolate icing on the top of the pudding bowl. Scatter the chopped cashew nuts on the top.\r\nAllow the pudding to chill for 30 minutes or more and enjoy. ', 'des1.jpg', 'yes', 'LKR', '200.00'),
(15, 4, 'Chocolate Moose', 'Beat egg yolks in small bowl with electric mixer on high speed about 3 minutes or until thick and lemon colored. Gradually beat in sugar.\r\n2\r\nHeat 1 cup whipping cream in 2-quart saucepan over medium heat until hot. Gradually stir at least half of the hot whipping cream into egg yolk mixture; stir back into hot cream in saucepan. Cook over low heat about 5 minutes, stirring constantly, until mixture thickens (do not boil). Stir in chocolate until melted. Cover and refrigerate about 2 hours, stirring occasionally, just until chilled.\r\n3\r\nBeat 1 1/2 cups whipping cream in chilled medium bowl with electric mixer on high speed until stiff. Fold whipped cream into chocolate mixture. Pipe or spoon mixture into serving bowls. Refrigerate until serving.', 'des3.jpg', 'yes', 'LKR', '250.00'),
(16, 4, 'Strawberry Waffle ', 'Wash and trim the strawberries, then cut into 1/4-inch slices. Place half of the sliced strawberries in a food processor or blender and puree. Set aside both sliced and pureed strawberry\r\nCombine cream, milk, and sugar in a medium saucepan over medium heat and cook, stirring, until the sugar is completely dissolved. Remove from heat and pour mixture into a large bowl. Add the strawberry puree and mix well. Cover with plastic wrap and chill in the refrigerator until completely cool.\r\nWhile the cream mixture is chilling, dice the remaining sliced strawberries into smaller pieces to mix into the ice cream. Pour the cooled cream mixture into an ice cream maker and process according to the manufacturer\'s instructions. Towards the end of the process, stir in the diced strawberries. Transfer the ice cream to an airtight container and freeze for at least 2 more hours before serving.', 'des5.png', 'yes', 'LKR', '280.00'),
(17, 5, 'Black Mojito', 'Muddle mint, sugar, and lime in the bottom of a tall, sturdy glass, just until mint is bruised and limes have been mostly juiced. (If you over muddle, you will pulverize the mint, which is not what you want.) If you don\'t have a muddler, use the end of a heavy wooden spoon instead.\r\nAdd rum, and muddle a tiny bit more to mix.\r\nFill glass with ice, then top with club soda. Serve with cocktail straws if you have them.', 'bev5.jpg', 'yes', 'LKR', '240.00'),
(18, 5, 'Mixed Berry Mojito', 'This mixed berry mojito combines delicious fresh raspberries, blackberries, mint and rum. It\'s super delicious, perfect for spring and takes only 5 minutes to make!\r\nTake two short cocktail glasses and fill with equal parts blackberries, raspberries, mint leaves and Truvia.\r\n\r\nSqueeze lime wedges into the glass and pour in rum.\r\n\r\nMuddle the mixture together breaking up the berries and bruising the mint.\r\n\r\nAdd in ice and top with seltzer. Gently stir to combine.', 'bev1.jpg', 'yes', 'LKR', '240.00'),
(19, 5, 'Strawberry Crusher', 'Place strawberries in an airtight container or plastic bag and leave in the freezer for 1 1/2 hours.\r\n2. Remove strawberries from freezer. Place half of the frozen strawberries in the jar of a blender. Add ice, whole almonds, sugar, milk, and liqueur and as many more strawberries as will fit. Blend until there is enough room to add more strawberries. Add remaining strawberries and blend until smooth and spoonable. Divide among 4 serving dishes. Garnish with slivered almonds and serve immediately.', 'bev7.jpg', 'yes', 'LKR', '290.00'),
(20, 5, 'Choco Lash', 'Mix vanilla ice cream, Oreo biscuit, milk, ice cubes and chocolate. Blend it for 2-3 minutes.Pour in a glass and top with crushed oreo biscuit, chocolate and cookies and Enjoy.\r\nIt serves Per Head', 'bev8.jpg', 'yes', 'LKR', '290.00'),
(22, 2, 'abc', 'asdfas', '1579712142bev8.jpg', 'yes', 'LKR', '444.00'),
(23, 2, 'abc', 'asdfas', '1579712348bev8.jpg', 'yes', 'LKR', '444.00'),
(24, 7, 'test menu', 'afas as faslj flasjdl kfjasd fasd', '1579712669bev3.jpg', 'yes', 'LKR', '9999.00'),
(25, 1, 'Banana Juice', 'Banana Juice', '1579716024bev2.jpg', 'yes', 'LKR', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_catagory`
--

CREATE TABLE `tbl_product_catagory` (
  `catagory_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `availability` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_catagory`
--

INSERT INTO `tbl_product_catagory` (`catagory_id`, `category_name`, `availability`) VALUES
(1, 'Pizza', 'yes'),
(2, 'Pasta', 'yes'),
(3, 'Burger', 'yes'),
(4, 'Dessert', 'yes'),
(5, 'Crushers', 'yes'),
(6, 'abc', 'no'),
(7, 'Burgerx', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_item`
--

CREATE TABLE `tbl_product_item` (
  `tbl_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_item`
--

INSERT INTO `tbl_product_item` (`tbl_id`, `product_id`, `item_id`) VALUES
(1, 23, 1),
(2, 23, 4),
(3, 24, 4),
(4, 24, 5),
(5, 25, 1),
(6, 25, 4),
(7, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_title` varchar(255) NOT NULL,
  `promotion_image` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`promotion_id`, `promotion_title`, `promotion_image`, `status`) VALUES
(1, 'test promotion', '1554025365Desert.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(2) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staff_role` enum('staff','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `username`, `title`, `first_name`, `last_name`, `password`, `staff_role`) VALUES
(1, 'chamara', 'mr', 'chamara', 'chaturanga', '123', 'staff'),
(2, 'samera', 'mr', 'samera', 'perera', '123', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `register_date` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('register','guest') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `title`, `first_name`, `last_name`, `phone_number`, `register_date`, `password`, `user_type`, `status`) VALUES
(1, 'saman@gmail.com', 'mr', 'nirash', 'perera', '0713694511', '2019-01-23', '', 'guest', 'active'),
(2, 'nimal@gmail.com', 'Mr', 'praveen', 'tissera', '0713467833', '2019-02-18', '', 'guest', 'active'),
(3, 'wimal@gmail.com', 'Mr', 'surangi', 'tissera', '0713467833', '2019-02-18', '', 'guest', 'active'),
(4, 'hazmath@gmail.com', 'Mr', 'hazmath', 'abc', '0713467833', '2019-02-19', '', 'guest', 'active'),
(6, 'praveenlog@gmail.com', 'Mr', 'praveen', 'tissera', '0713467833', '2019-02-18', '123', 'register', 'active'),
(7, 'p@gmail.com', 'Mr', 'praveen', 'tissa', '0713691344', '2020-01-25', '', 'guest', 'active'),
(8, 'ptissera@gmail.com', 'Mr', 'praveen', 'tissera', '0713691344', '2020-01-25', '123456', 'register', 'active'),
(9, 'dammith@gmail.com', 'Mr', 'dammith', 'asanka', '0712563544', '2020-02-03', '', 'guest', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `txn_id` (`txn_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_catagory`
--
ALTER TABLE `tbl_product_catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `tbl_product_item`
--
ALTER TABLE `tbl_product_item`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_product_catagory`
--
ALTER TABLE `tbl_product_catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product_item`
--
ALTER TABLE `tbl_product_item`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
