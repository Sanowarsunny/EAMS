CREATE or REPLACE VIEW objec_accessed
as 
SELECT c.id,c.name user_name,c.email,c.company_name,c.user_type,c.status ,b.manageobject_id,a.name object_name,a.description url
from users c,objectaccesses b, manageobjects a
where c.id=b.user_id
and b.manageobject_id=a.id
order by c.name,c.company_name

CREATE or REPLACE VIEW object_access_to_company
as 
SELECT a.id,a.company_id,c.name company_name, a.manageobject_id,b.name object_name
FROM objectaccesstocompanies a,manageobjects b,companies c
WHERE a.manageobject_id=b.id
and a.company_id=c.id


CREATE or REPLACE view object_to_role
AS
select a.id,a.rollmanage_id,c.name role_name, a.manageobject_id,b.name object_name,b.description url
from objecttoroles a,manageobjects b , rollmanages c
WHERE a.manageobject_id=b.id
and a.rollmanage_id=c.id