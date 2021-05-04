ALTER TABLE `tbl_usuarios_usr` ADD `usr_modalidad` VARCHAR(50) NOT NULL DEFAULT 'PRESENCIAL' AFTER `usr_matricula`, ADD `usr_pqt_interes_nombre` TEXT NOT NULL AFTER `usr_modalidad`, ADD `usr_pqt_interes_sku` TEXT NOT NULL AFTER `usr_pqt_interes_nombre`;
ALTER TABLE `tbl_cupones_cps` ADD `cps_descuento_pagos` TEXT NOT NULL AFTER `cps_estado`;
ALTER TABLE `tbl_paquete_pqt` ADD `pqt_cupon_default` TEXT NOT NULL AFTER `pqt_fecha_registro`;



ALTER TABLE `tbl_ficha_pago_fpg` ADD `fpg_pago_online` TEXT NOT NULL AFTER `fpg_numero_semana`;
ALTER TABLE `tbl_ficha_venta_vfch` CHANGE `vfch_id_corte` `vfch_id_corte` VARCHAR(11) NOT NULL DEFAULT '1';