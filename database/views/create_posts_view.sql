CREATE OR REPLACE VIEW view_posts AS
SELECT p.id,
       pt.title,
       pt.sub_title,
       pt.description,
       pt.language_code,
       p.views_count,
       p.keywords,
       p.created_date

FROM posts p
         join post_translations pt on p.id = pt.object_id where pt.title is not null;
