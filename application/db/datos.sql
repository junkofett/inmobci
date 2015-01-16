--INSERTO DE PROPIETARIOS
insert into propietarios (dni, nombre, telefono)
        values (48852145, 'Juan', 893631549);
insert into propietarios (dni, nombre, telefono)
        values (25548965, 'Antuan', 896547852);
insert into propietarios (dni, nombre, telefono)
        values (24563178, 'Truan', 45678936);
insert into propietarios (dni, nombre, telefono)
        values (78845425, 'Carmen', 521459874);

--INSERTO DE INMUEBLES
insert into inmuebles (propietarios_id, precio, habitaciones, baños, lavavajillas, garaje, trastero)
        values (1,300,2,1,FALSE, TRUE, TRUE);
insert into inmuebles (propietarios_id, precio, habitaciones, baños, lavavajillas, garaje, trastero)
        values (1,200,3,2,TRUE, TRUE, FALSE);
insert into inmuebles (propietarios_id, precio, habitaciones, baños, lavavajillas, garaje, trastero)
        values (4,550,1,1,FALSE, FALSE, TRUE);
insert into inmuebles (propietarios_id, precio, habitaciones, baños, lavavajillas, garaje, trastero)
        values (3,325,2,3,TRUE, TRUE, TRUE);
insert into inmuebles (propietarios_id, precio, habitaciones, baños, lavavajillas, garaje, trastero)
        values (3,100,1,3,FALSE, FALSE, TRUE);
insert into inmuebles (propietarios_id, precio, habitaciones, baños, lavavajillas, garaje, trastero)
        values (4,245,2,2,TRUE, FALSE, TRUE);

/*
--INSERTO DE CARACTERÍSTICAS
insert into caracteristicas (caracteristica)
        values('lavavajillas');
insert into caracteristicas (caracteristica)
        values('garaje');
insert into caracteristicas (caracteristica)
        values('trastero');

--RELACIÓN DE CARACTERÍSTICAS CON INMUEBLES
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(1,1);
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(1,2);
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(2,1);
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(3,3);
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(5,1);
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(6,2);
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(2,2);
insert into carac_inmuebles (inmueble_numero, caracteristicas_id)
        values(5,3);
*/