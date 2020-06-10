    <?php
class ShopProductWriter
{
    public static function write($product)
    {
        if (
            !($product instanceof BookProduct) && 
            !($product instanceof CdProduct)
        ) {
            throw new \TypeError;
        }
        return sprintf('%s: %s; Price: <span style="color:green">%01.2f$</span>',
            $product->title,
            $product->getAuthor(),
            $product->price
        );
    }
}