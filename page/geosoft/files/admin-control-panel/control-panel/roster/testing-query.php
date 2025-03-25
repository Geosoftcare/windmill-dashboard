<?php
DELIMITER $$
CREATE PROCEDURE sp_report(IN dt_start DATE, IN dt_end DATE)
BEGIN
  SET @sql = NULL;

  SELECT GROUP_CONCAT(DISTINCT
           CONCAT('SUM(CASE WHEN DATE(iac.created_at) = ''',
           DATE_FORMAT(created_at, '%Y-%m-%d'),
           ''' THEN 1 ELSE 0 END) `',
           DATE_FORMAT(created_at, '%Y-%m-%d'), '`'))
    INTO @sql
    FROM iac
   WHERE iac.created_at >= DATE_FORMAT(dt_start, '%Y-%m-%d 00:00:00') 
     AND iac.created_at <= DATE_FORMAT(dt_end,   '%Y-%m-%d 23:59:59') ;

  SET @sql = CONCAT('SELECT iw.display_name area, iet.type `type`, ', @sql, 
                    ', COUNT(iac.id) total 
                       FROM iac JOIN ioc 
                         ON ioc.id = iac.ioc_id JOIN iet 
                         ON iet.id = ioc.iet_id JOIN iw  
                         ON iw.id  = iac.iw_id
                      WHERE iac.created_at >= ', DATE_FORMAT(dt_start, '%Y-%m-%d 00:00:00'),  
                    '   AND iac.created_at <= ', DATE_FORMAT(dt_end,   '%Y-%m-%d 23:59:59'),
                    ' GROUP BY iw.id, iet.id
                      ORDER BY iw.display_name, iet.type');
  PREPARE stmt FROM @sql;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
END$$
DELIMITER ;
?>