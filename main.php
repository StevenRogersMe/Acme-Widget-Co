class Basket {
  private $products;
  private $deliveryRules;
  private $offers;
  private $items;

  public function __construct($productCatalogue, $deliveryChargeRules, $offers) {
    $this->products = $productCatalogue;
    $this->deliveryRules = $deliveryChargeRules;
    $this->offers = $offers;
    $this->items = array();
  }

  public function add($productCode) {
    if (array_key_exists($productCode, $this->products)) {
      $this->items[] = $productCode;
    } else {
      echo "Invalid product code: $productCode";
    }
  }

  public function total() {
    $totalCost = 0;

    foreach ($this->items as $item) {
      $totalCost += $this->products[$item];
    }

    $deliveryCost = $this->calculateDeliveryCost($totalCost);
    $discount = $this->calculateOfferDiscount($this->items);

    return $totalCost + $deliveryCost - $discount;
  }

  private function calculateDeliveryCost($totalCost) {
    if ($totalCost < 50) {
      return 4.95;
    } elseif ($totalCost < 90) {
      return 2.95;
    } else {
      return 0;
    }
  }

  private function calculateOfferDiscount($items) {
    $redWidgetCount = 0;

    foreach ($items as $item) {
      if ($item === 'R01') {
        $redWidgetCount++;
      }
    }

    $discountedRedWidgets = floor($redWidgetCount / 2);
    $discount = $this->products['R01'] * $discountedRedWidgets * 0.5;

    return $discount;
  }
}
