create or replace procedure sp_pagar_recibo(p_id_recibo integer) 
language plpgsql as $$

declare
	
    v_id_poliza integer;
	v_viejo character varying;
	v_recibo character varying;
	
	v_nuevo character varying;
	v_fecha date;
	v_estatus character varying;
	
begin

	v_fecha = '2026-09-08';
	v_nuevo = 'Activo';

	select p.id_poliza, p.estatus, r.estado
    into v_id_poliza,v_viejo,v_recibo
	
	from polizas p inner join recibos r
	
	on p.id_poliza = r.id_poliza
	
	where r.estado in ('Pendiente') and p.estatus = 'REN' and r.id_recibo = p_id_recibo;

		IF NOT FOUND THEN
        
			RAISE NOTICE 'No se encontró ningún registro.';
        
	    ELSE

		update recibos set estado = 'Pagado' where id_recibo = p_id_recibo;

		insert into bitacora (id_poliza,old_estatus,new_estatus,fec_mov)
		values(v_id_poliza,v_viejo,v_nuevo,v_fecha);

	        raise notice 'Recibo Procesado con Exito';
			
	    END IF;
end;
$$;

-- llamado al procedimiento:

do $$

begin

	call sp_pagar_recibo(2);

end $$;