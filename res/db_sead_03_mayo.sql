ALTER TABLE `tbl_ficha_pago_fpg`
ADD COLUMN `fpg_estado_certificado`  varchar(50) NULL AFTER `fpg_cupon_detalle`,
ADD COLUMN `fpg_nota_certificado`  text NULL AFTER `fpg_estado_certificado`;
