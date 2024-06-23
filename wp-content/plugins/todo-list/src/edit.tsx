import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import { useState } from "react";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const [inputValues, setInputValues] = useState(attributes.content || {});
	const [fields, setFields] = useState(0);

	const onChangeInput = (index) => (event) => {
		const newValue = event.target.value;
		const newInputValues = { ...inputValues, [index]: newValue };
		setInputValues(newInputValues);
		setAttributes({ content: newInputValues });
	};

	const onClickAdd = () => {
		setFields((prev) => prev + 1);
	};

	return (
		<div {...useBlockProps()}>
			{Array.from({ length: fields }).map((_, index) => (
				<input
					key={index}
					type="text"
					value={inputValues[index] || ""}
					onChange={onChangeInput(index)}
				/>
			))}
			<button onClick={onClickAdd}>{__("項目を追加", "todo-list")}</button>
		</div>
	);
}
