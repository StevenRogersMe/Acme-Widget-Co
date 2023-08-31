# Acme-Widget-Co

// Example usage

You can use the Acme-Widget-co class by following this way

$productCatalogue = array(
  'R01' => 32.95,
  'G01' => 24.95,
  'B01' => 7.95
);

$offers = array(
  'buyOneGetOneHalfPrice' => 'R01'
);

$basket = new Basket($productCatalogue, $offers);

$basket->add('R01');  // Add a red widget to the basket

$basket->add('G01');  // Add a green widget to the basket

$totalCost = $basket->total();  // Calculate the total cost of the basket

echo "Total cost: $" . number_format($totalCost, 2);
