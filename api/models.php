<?php

class Car {
    public int $ID;
    public string $Category;
    public string $Image;
    public string $Brand;
    public string $Model;
    public int $YearProduction;
    public int $Mileage;
    public string $FuelType;
    public string $DriveType;
    public int $EngineDisplacement;
    public int $EnginePower;
    public string $Transmission;
    public float $FuelConsumption;
    public string $Body;
    public int $Doors;
    public float $Price;

    public function validate_id(): bool {
        if (isset($this->ID) == false || $this->ID <= 0) return false;
        else return true;
    }

    public function validate(): bool {
        if (isset($this->Category) == false || $this->Category == "" ||
            isset($this->Image) == false || $this->Image == "" ||
            isset($this->Brand) == false || $this->Brand == "" ||
            isset($this->Model) == false || $this->Model == "" ||
            isset($this->YearProduction) == false || $this->YearProduction <= 0 ||
            isset($this->Mileage) == false || $this->Mileage <= 0 ||
            isset($this->FuelType) == false || $this->FuelType == "" ||
            isset($this->DriveType) == false || $this->DriveType == "" ||
            isset($this->EngineDisplacement) == false || $this->EngineDisplacement <= 0 ||
            isset($this->EnginePower) == false || $this->EnginePower <= 0 ||
            isset($this->Transmission) == false || $this->Transmission == "" ||
            isset($this->FuelConsumption) == false || $this->FuelConsumption <= 0 ||
            isset($this->Body) == false || $this->Body == "" ||
            isset($this->Doors) == false || $this->Doors <= 0 ||
            isset($this->Price) == false || $this->Price < 0)
            return false;
        else return true;
    }
}

class Message {
    public int $ID;
    public string $Time;
    public string $Name;
    public string $Email;
    public string $Topic;
    public string $Content;

    public function validate(): bool {
        if (isset($this->Time) == false || $this->Time == "" ||
            isset($this->Name) == false || $this->Name == "" ||
            isset($this->Email) == false || $this->Email == "" ||
            isset($this->Topic) == false || $this->Topic == "" ||
            isset($this->Content) == false || $this->Content == "")
            return false;
        else return true;
    }
}

class User {
    public int $ID;
    public string $Username;
    public string $Password;
    public string $PasswordHash;

    public function validate(): bool {
        if (isset($this->Username) == false || $this->Username == "" ||
            isset($this->Password) == false || $this->Password == "")
            return false;
        else return true;
    }

    public function encode_password(): void {
        $this->PasswordHash =  hash("sha256", $this->Password);
    }
}

?>