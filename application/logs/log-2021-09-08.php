<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-08 15:56:07 --> Severity: Notice --> Undefined index: ip_address_id /var/www/vhosts/insurancesathi.in/httpdocs/gic_org/application/views/master/ip/ip_master.php 77
ERROR - 2021-09-08 16:04:57 --> 404 Page Not Found: master/Gallary/index
ERROR - 2021-09-08 16:05:34 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 16:05:34 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 16:05:38 --> Query error: Unknown column 'claim_mediclaim_intimation.cmi_admission_date' in 'field list' - Invalid query: SELECT *, `master_policy_type`.*, `policy_member_details`.`policy_id`, `policy_member_details`.`fk_company_id`, `policy_member_details`.`fk_cust_member_id`, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name, 'null', ''), ' ', REPLACE(customermem_tbl.surname, 'null', '')) AS member_name, `claim_mediclaim_intimation`.`del_flag` as `cmi_del_flag`, `claim_mediclaim_intimation`.`cmi_fk_policy_inc_company`, `claim_mediclaim_intimation`.`cmi_fk_policy_claiment`, `claim_mediclaim_intimation`.`cmi_fk_policy_holder`, `claim_mediclaim_intimation`.`cmi_fk_policy_type`, DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date, '%d-%m-%Y') as cmi_admission_date
FROM `claim_mediclaim_intimation`
LEFT JOIN `policy_member_details` ON `claim_mediclaim_intimation`.`cmi_fk_policy_id` = `policy_member_details`.`policy_id`
LEFT JOIN `customermem_tbl` ON `claim_mediclaim_intimation`.`cmi_fk_policy_claiment` = `customermem_tbl`.`id`
LEFT JOIN `master_company` ON `policy_member_details`.`fk_company_id`=`master_company`.`mcompany_id`
LEFT JOIN `master_policy_type` ON `claim_mediclaim_intimation`.`cmi_fk_policy_type` = `master_policy_type`.`policy_type_id`
GROUP BY `claim_mediclaim_intimation`.`mcmdic_id`
ERROR - 2021-09-08 16:06:25 --> Query error: Table 'gic_org.policy_member_csv_dummy' doesn't exist - Invalid query: INSERT INTO `policy_member_csv_dummy` (`addition_of_more_child`, `date_commenced`, `date_from`, `date_to`, `family_size`, `fk_agency_id`, `fk_client_id`, `fk_company_id`, `fk_cust_member_id`, `fk_department_id`, `fk_policy_type_id`, `fk_staff_id`, `fk_sub_agent_id`, `fk_user_role_id`, `floater_policy_type`, `mode_of_premimum`, `policy_counter`, `policy_no`, `policy_type`, `policy_upload`, `quotation_date`, `quotation_male_link`, `quotation_upload`, `reg_email`, `reg_mobile`, `serial_no`, `serial_no_month`, `serial_no_year`) VALUES (NULL,'2019-10-15','2020-10-15','2021-10-14',NULL,NULL,74,'4',2819,'3','25','1',NULL,'1',NULL,NULL,1,'160800/11120/AA01226601',1,NULL,NULL,NULL,NULL,NULL,NULL,'0001',10,2020)
ERROR - 2021-09-08 16:42:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 16:42:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 16:42:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:22:33 --> Severity: error --> Exception: syntax error, unexpected ',' /var/www/vhosts/insurancesathi.in/httpdocs/gic_org/application/controllers/master/Import.php 241
ERROR - 2021-09-08 17:23:37 --> Query error: Table 'gic_org.policy_member_csv_dummy' doesn't exist - Invalid query: INSERT INTO `policy_member_csv_dummy` (`addition_of_more_child`, `date_commenced`, `date_from`, `date_to`, `family_size`, `fk_agency_id`, `fk_client_id`, `fk_company_id`, `fk_cust_member_id`, `fk_department_id`, `fk_policy_type_id`, `fk_staff_id`, `fk_sub_agent_id`, `fk_user_role_id`, `floater_policy_type`, `mode_of_premimum`, `policy_counter`, `policy_no`, `policy_type`, `policy_upload`, `quotation_date`, `quotation_male_link`, `quotation_upload`, `reg_email`, `reg_mobile`, `serial_no`, `serial_no_month`, `serial_no_year`) VALUES (NULL,'2019-10-15','2020-10-15','2021-10-14',NULL,NULL,74,'4',2819,'3','25','1',NULL,'1',NULL,NULL,1,'160800/11120/AA01226601',1,NULL,NULL,NULL,NULL,NULL,NULL,'0001',10,2020)
ERROR - 2021-09-08 17:23:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:23:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:23:54 --> Query error: Table 'gic_org.policy_member_csv_dummy' doesn't exist - Invalid query: INSERT INTO `policy_member_csv_dummy` (`addition_of_more_child`, `date_commenced`, `date_from`, `date_to`, `family_size`, `fk_agency_id`, `fk_client_id`, `fk_company_id`, `fk_cust_member_id`, `fk_department_id`, `fk_policy_type_id`, `fk_staff_id`, `fk_sub_agent_id`, `fk_user_role_id`, `floater_policy_type`, `mode_of_premimum`, `policy_counter`, `policy_no`, `policy_type`, `policy_upload`, `quotation_date`, `quotation_male_link`, `quotation_upload`, `reg_email`, `reg_mobile`, `serial_no`, `serial_no_month`, `serial_no_year`) VALUES (NULL,'2019-10-15','2020-10-15','2021-10-14',NULL,NULL,74,'4',2819,'3','25','1',NULL,'1',NULL,NULL,1,'160800/11120/AA01226601',1,NULL,NULL,NULL,NULL,NULL,NULL,'0001',10,2020)
ERROR - 2021-09-08 17:34:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:34:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:34:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:42:03 --> Severity: Notice --> Undefined index: ip_address_id /var/www/vhosts/insurancesathi.in/httpdocs/gic_org/application/views/master/ip/ip_master.php 77
ERROR - 2021-09-08 17:46:40 --> Severity: Notice --> file_get_contents(): read of 8192 bytes failed with errno=21 Is a directory /var/www/vhosts/insurancesathi.in/httpdocs/gic_org/application/controllers/master/Policy.php 11124
ERROR - 2021-09-08 17:48:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:48:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:48:36 --> Query error: Unknown column 'claim_mediclaim_intimation.cmi_admission_date' in 'field list' - Invalid query: SELECT *, `master_policy_type`.*, `policy_member_details`.`policy_id`, `policy_member_details`.`fk_company_id`, `policy_member_details`.`fk_cust_member_id`, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name, 'null', ''), ' ', REPLACE(customermem_tbl.surname, 'null', '')) AS member_name, `claim_mediclaim_intimation`.`del_flag` as `cmi_del_flag`, `claim_mediclaim_intimation`.`cmi_fk_policy_inc_company`, `claim_mediclaim_intimation`.`cmi_fk_policy_claiment`, `claim_mediclaim_intimation`.`cmi_fk_policy_holder`, `claim_mediclaim_intimation`.`cmi_fk_policy_type`, DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date, '%d-%m-%Y') as cmi_admission_date
FROM `claim_mediclaim_intimation`
LEFT JOIN `policy_member_details` ON `claim_mediclaim_intimation`.`cmi_fk_policy_id` = `policy_member_details`.`policy_id`
LEFT JOIN `customermem_tbl` ON `claim_mediclaim_intimation`.`cmi_fk_policy_claiment` = `customermem_tbl`.`id`
LEFT JOIN `master_company` ON `policy_member_details`.`fk_company_id`=`master_company`.`mcompany_id`
LEFT JOIN `master_policy_type` ON `claim_mediclaim_intimation`.`cmi_fk_policy_type` = `master_policy_type`.`policy_type_id`
GROUP BY `claim_mediclaim_intimation`.`mcmdic_id`
ERROR - 2021-09-08 17:57:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:57:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:57:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:57:58 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 17:57:58 --> 404 Page Not Found: Assets/libs
