--
-- Déchargement des données de la table `proj__product`
--

INSERT INTO `proj__product` (`product_id`, `tag_id`, `discount_id`, `name`, `description`, `product_picture_id`, `price`, `rating`) VALUES
(2, 1, NULL, 'Archon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam purus, eleifend vel leo in, pharetra placerat sem. Nam dictum magna semper, semper diam in, tempus ligula. Proin id porta enim. Sed tincidunt tellus ac massa malesuada sagittis. Phasellus r', 1, 68.99, NULL),
(3, 1, 2, 'Count', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam purus, eleifend vel leo in, pharetra placerat sem. Nam dictum magna semper, semper diam in, tempus ligula. Proin id porta enim. Sed tincidunt tellus ac massa malesuada sagittis. Phasellus r', 2, 109.99, NULL),
(6, 1, 2, 'Malevolent', NULL, 3, 199.99, NULL),
(7, 1, 2, 'Sorc', NULL, 4, 289.99, NULL);
