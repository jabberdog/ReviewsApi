# ReviewsApi
API Wrapper for Reviews.co.uk

## Product Review Publish
To get a collection of published reviews against a product, you will need to make a ```GET``` request to the review endpoint along with your store name and product SKU.

Example:
```https://api.reviews.co.uk/product/review?store=<YOUR_STORE_NAME>&sku=<PRODUCT_SKU>```

The response body is returned in JSON and so it should be handled appropriately.

## Merchant Reviews
If you want to return a collection of reviews stored again the store rather then the product, then you can do so by making a ```GET``` request to the relevant endpoint.

Example:
```https://api.reviews.co.uk/merchant/reviews?store=<YOUR_STORE_NAME>```

Again, the response body is returned in JSON and so it should be handled appropriately.

More information about the Reviews.co.uk API can be found in their documentation [here](https://api.reviews.co.uk/documentation/index.html).
