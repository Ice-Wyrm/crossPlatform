select owner.name, owner.id from factory
inner join factory_owner  on factory.id = factory_owner.factory_id
inner join owner on factory_owner.owner_id = owner.id
where factory_id = :id