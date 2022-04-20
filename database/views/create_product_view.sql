CREATE OR REPLACE VIEW `view_products` AS
SELECT p.id,
       p.price,
       p.discount_price,
       p.brand_id,
       p.views_count,
       pt.title,
       pt.language_code,
       pt.description,
       pt.specification,
       pt.id AS product_translation_id
FROM products p
         join product_translations pt on p.id = pt.object_id
where pt.title is not null;
