SELECT region_name AS Region, si_no AS SI, si_area AS Area, field_party_name AS FP, SUM(dpr_coverage) AS Ach FROM dpr_onland
	 JOIN si ON dpr_onland.dpr_si = si.si_id 
     JOIN field_parties ON dpr_onland.dpr_field_party = field_parties.field_party_id 
     JOIN regions ON si.si_region = regions.region_id 
    WHERE dpr_onland.dpr_date BETWEEN '2018-11-07' AND '2019-06-30' AND si_acq_type like '%3D%'
    GROUP BY SI ORDER BY Region;
    