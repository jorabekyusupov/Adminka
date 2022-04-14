CREATE OR REPLACE VIEW view_posts AS
SELECT p.id,
       pt.title,
       pt.sub_title,
       pt.description,
       pt.language_code,
       p.views_count,
       p.keywords,
       p.created_date,
       pt.id       as post_translation_id,
       c.id        as category_id,
       c.title     as category_title,
       c.parent_id as category_parent_id
FROM posts p
         join post_translations pt on p.id = pt.object_id
         join post_categories pc on p.id = pc.post_id
         join view_categories c on pc.category_id = c.id and c.language_code = pt.language_code
