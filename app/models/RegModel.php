<?php
class RegModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query("INSERT INTO registrations 
            (surname, other_name, age, gender, marital_status, state, zone, address, mobile, alt_no, email, 
             church, post, born_again, baptism, calling, in_calling, entered_calling, attended_mitre, why_mitre, 
             occupation, lang_speak, lang_write, litracy, certificate, cert_year, institution, oversight, 
             ref_name, ref_phone, ref_address, ref_email, ref_duration, ref_info)
            VALUES 
            (:surname, :other_name, :age, :gender, :marital_status, :state, :zone, :address, :mobile, :alt_no, :email, 
             :church, :post, :born_again, :baptism, :calling, :in_calling, :entered_calling, :attended_mitre, :why_mitre, 
             :occupation, :lang_speak, :lang_write, :litracy, :certificate, :cert_year, :institution, :oversight, 
             :ref_name, :ref_phone, :ref_address, :ref_email, :ref_duration, :ref_info)");

        // Bind values
        foreach ($data as $key => $value) {
            $this->db->bind(":$key", $value);
        }

        return $this->db->execute();
    }

    public function step1($data)
    {
        $this->db->query("INSERT INTO registrations 
            (reg_id, surname, other_name, age, gender, marital_status, state, zone, address, mobile, alt_no, email, occupation, lang_speak, lang_write, litracy)
            VALUES 
            (:reg_id, :surname, :other_name, :age, :gender, :marital_status, :state, :zone, :address, :mobile, :alt_no, :email, :occupation, :lang_speak, :lang_write, :litracy)");

        // Bind values
        $this->db->bind(':reg_id', $data['reg_id']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':other_name', $data['other_name']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':marital_status', $data['marital_status']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zone', $data['zone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':alt_no', $data['alt_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':occupation', $data['occupation']);
        $this->db->bind(':lang_speak', $data['lang_speak']);
        $this->db->bind(':lang_write', $data['lang_write']);
        $this->db->bind(':litracy', $data['litracy']);

        return $this->db->execute();
    }
    public function findRegId($reg_id)
    {
        $this->db->query("SELECT * FROM registrations WHERE reg_id = :reg_id");
        $this->db->bind(':reg_id', $reg_id);
        return $this->db->single();
    }
    public function step2($id, $data)
    {
        $sql = "UPDATE registrations SET
                church = :church,
                post = :post,
                born_again = :born_again,
                baptism = :baptism,
                calling = :calling,
                in_calling = :in_calling,
                entered_calling = :entered_calling,
                attended_mitre = :attended_mitre,
                why_mitre = :why_mitre,
                certificate = :certificate,
                cert_year = :cert_year,
                institution = :institution,
                oversight = :oversight
            WHERE reg_id = :id";

        $this->db->query($sql);

        $this->db->bind(':church', $data['church']);
        $this->db->bind(':post', $data['post']);
        $this->db->bind(':born_again', $data['born_again']);
        $this->db->bind(':baptism', $data['baptism']);
        $this->db->bind(':calling', $data['calling']);
        $this->db->bind(':in_calling', $data['in_calling']);
        $this->db->bind(':entered_calling', $data['entered_calling']);
        $this->db->bind(':attended_mitre', $data['attended_mitre']);
        $this->db->bind(':why_mitre', $data['why_mitre']);
        $this->db->bind(':certificate', $data['certificate']);
        $this->db->bind(':cert_year', $data['cert_year']);
        $this->db->bind(':institution', $data['institution']);
        $this->db->bind(':oversight', $data['oversight']);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function Step3($id, $data)
    {
        $sql = "UPDATE registrations SET
                ref_name = :ref_name,
                ref_phone = :ref_phone,
                ref_email = :ref_email,
                ref_address = :ref_address,
                ref_duration = :ref_duration,
                ref_info = :ref_info
            WHERE reg_id = :id";

        $this->db->query($sql);

        $this->db->bind(':ref_name', $data['ref_name']);
        $this->db->bind(':ref_phone', $data['ref_phone']);
        $this->db->bind(':ref_email', $data['ref_email']);
        $this->db->bind(':ref_address', $data['ref_address']);
        $this->db->bind(':ref_duration', $data['ref_duration']);
        $this->db->bind(':ref_info', $data['ref_info']);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function addPassport($data)
    {
        $sql = "UPDATE registrations SET
                photo = :photo
            WHERE reg_id = :id";

        $this->db->query($sql);

        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }


    // Update Step 1
    public function updateStep1($id, $data)
    {
        $sql = "UPDATE registrations SET
                surname = :surname,
                other_name = :other_name,
                age = :age,
                gender = :gender,
                marital_status = :marital_status,
                state = :state,
                zone = :zone,
                address = :address,
                mobile = :mobile,
                alt_no = :alt_no,
                email = :email,
                occupation = :occupation,
                lang_speak = :lang_speak,
                lang_write = :lang_write,
                litracy = :litracy
            WHERE reg_id = :id";

        $this->db->query($sql);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':other_name', $data['other_name']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':marital_status', $data['marital_status']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zone', $data['zone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':alt_no', $data['alt_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':occupation', $data['occupation']);
        $this->db->bind(':lang_speak', $data['lang_speak']);
        $this->db->bind(':lang_write', $data['lang_write']);
        $this->db->bind(':litracy', $data['litracy']);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}
