CREATE OR REPLACE VIEW `view_product_categories` AS
SELECT pc.id,
       pc.parent_id,
       pct.title,
       pct.description,
       pct.language_code,
       pct.id as product_category_translation_id
FROM product_categories pc
    join product_category_translations pct on pc.id = pct.object_id and pct.title is not null ;
