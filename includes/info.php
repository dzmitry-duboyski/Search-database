<div class="dm-overlay" id="win1">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <h3>Подробная информация об обращении пациента</h3>
                <div class="pl-left">
                    <?php 
           				echo "<br>Фамилия: ".$row["Surname"];
						echo "<br>Имя: ".$row["Name"];
						echo "<br>Отчество: ".$row["Patronymic"];
						echo "<br>Дата рождения: ".$row["DOB"];
						echo "<br>Паспорт: ".$row["Document"];
						echo "<br>Адрес: ".$row["ResidentialAddress"];
						echo "<br>Телефон: ".$row["Phone"];	
						echo "<br>Номер истории: №".$row["HistoryNamber"];
						echo "<br>Дата поступления: ".$row["DateInReceiver"];
						echo "<br>Дата выписки: ".$row["DateOutReceiverHospital"];
						echo "<br>Отделение выписки: ".$row["DepartmentOut"];
						echo "<br>Тип оказанной помощи: ".$row["TypeMedicalHelp"];
                    ?>
                </div>
                <h3>
             	<a href="#close" class="close">Назад</a>
             	</h3>
            </div>
        </div>
    </div>
</div>