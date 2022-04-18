CREATE OR REPLACE VIEW `view_categories` AS
SELECT c.id,
       c.parent_id,
       ct.title,
       ct.language_code,
       ct.id as category_translation_id
FROM categories c
          JOIN category_translations ct ON c.id = ct.object_id;

