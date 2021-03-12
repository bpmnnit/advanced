SELECT SUM(dpr_coverage), region_name, si_no, si_area, field_party_name FROM dpr_onland
	INNER JOIN si ON dpr_onland.dpr_si = si.si_id 
    INNER JOIN field_parties ON dpr_onland.dpr_field_party = field_parties.field_party_id 
    INNER JOIN regions ON si.si_region = regions.region_id 
    WHERE dpr_onland.dpr_date BETWEEN '2019-10-01' AND '2020-09-30' AND si_acq_type = '3D'
    GROUP BY si_no ORDER BY region_name;